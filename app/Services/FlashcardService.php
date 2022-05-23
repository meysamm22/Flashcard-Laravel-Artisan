<?php


namespace App\Services;


use App\Models\Flashcard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FlashcardService
{
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
