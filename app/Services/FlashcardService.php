<?php


namespace App\Services;


use App\Models\Flashcard;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

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
        throw_if($validator->fails(), new RuntimeException($validator->getMessageBag()));
    }
}
