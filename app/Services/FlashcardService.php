<?php


namespace App\Services;


use App\Models\Flashcard;
use App\Models\Practice;
use App\Services\Exceptions\NotFoundException;
use App\Services\Exceptions\PracticeAllowanceException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FlashcardService
{

    public const INCORRECT_STATUS = "incorrect";
    public const CORRECT_STATUS = "correct";
    public const NOT_ANSWERED_STATUS = "not_answered";

    // TODO:: based-on requirment of assignment, User Auth will be implemented in the future.
    public const USER_ID = 1;

    /**
     * @throws \Throwable
     */
    public function create($input): Flashcard{
        $this->validate($input);
        return Flashcard::create([
            'question' => $input['question'],
            'answer' => $input['answer']
        ]);

    }

    public function list(): array{
        return Flashcard::select('question','answer')->get()->toArray();
    }

    public function listWithPracticeStatus(): array{
        $practices = DB::table('flashcards')
            ->select(['flashcards.id','question','status'])
            ->distinct()
            ->leftJoin('practices', function($join)
            {
                $join->on('flashcards.id', '=', 'practices.flashcard_id');
                $join->on('practices.user_id', '=', DB::raw(self::USER_ID));
            })->get();

        $result = [];
        foreach ($practices as $practice){
            $status = ($practice->status != null) ? $practice->status : self::NOT_ANSWERED_STATUS;
            $result[] = array(
                'ID' => $practice->id,
                'Question' => $practice->question,
                'Status' => __("flashcard.practice.status.".$status),
            );
        }

        return $result;
    }

    /**
     * @throws \Throwable
     */
    public function fetchFlashcardForPractice($id) : Flashcard{
        $flashcard = Flashcard::find($id);
        throw_if($flashcard == null, new NotFoundException(__("flashcard.practice.not_found_question")));
        $practice = $flashcard->practices()->where('user_id', self::USER_ID)->get()->first();
        throw_if($practice != null && $practice->status == self::CORRECT_STATUS, new PracticeAllowanceException(__("flashcard.practice.cannot_answer")));

        return $flashcard;
    }

    public function answerQuestion($flashcard, $answer): string{
        if (trim($flashcard->answer) == trim($answer)){
            $status = self::CORRECT_STATUS;
        }else{
            $status = self::INCORRECT_STATUS;
        }

        $practice = Practice::where("flashcard_id", $flashcard->id)->where("user_id", self::USER_ID)->get()->first();
        if ($practice != null){
            $practice->status = $status;
            $practice->user_answer = $answer;
            $practice->save();
        }else{
            Practice::create([
                'flashcard_id' => $flashcard->id,
                'user_id' => self::USER_ID,
                'user_answer' => $answer,
                'status' => $status
            ]);
        }

        return $status;
    }

    public function getPercentageOfCompletion(): float
    {
        $flashcards = $this->listWithPracticeStatus();
        $percentage = count(array_filter($flashcards, function($v) { return $v['Status'] == __("flashcard.practice.status.correct"); })) / count($flashcards) * 100;
        return round($percentage);
    }

    public function stats(): array{
        return [
          "Questions" => $this->flashcardCount(),
          "Answered" => $this->answeredQuestionPercentage(),
          "Correct" => $this->getPercentageOfCompletion()
        ];
    }

    private function flashcardCount(): int{
        return Flashcard::all()->count();
    }

    private function answeredQuestionPercentage(): float{
        $flashcards = $this->listWithPracticeStatus();
        $percentage = count(array_filter($flashcards, function($v) {
            return ($v['Status'] != __("flashcard.practice.status.not_answered"));
        })) / count($flashcards) * 100;
        return round($percentage);
    }

    /**
     * @param $input
     * @throws \Throwable
     */
    private function validate($input): void
    {
        $rules = [
            'question' => 'required',
            'answer' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        throw_if($validator->fails(), new ValidationException($validator));
    }
}
