<?php


namespace Tests\Feature;


use App\Models\Flashcard;
use App\Models\Practice;
use App\Services\FlashcardService;

class FlashcardFixtures
{
    public const QUESTION = 'Q1';
    public const ANSWER = 'A1';
    public const WRONG_ANSWER = 'A2';

    public static function createNotAnsweredFlashcard(): Flashcard
    {
        return Flashcard::create([
            'question' => self::QUESTION,
            'answer' => self::ANSWER
        ]);
    }

    public static function createCorrectAnsweredFlashcard(): Flashcard | Practice
    {
        return Flashcard::create([
            'question' => self::QUESTION,
            'answer' => self::ANSWER
        ])->practices()->create([
            'user_id' => FlashcardService::USER_ID,
            'user_answer' => self::ANSWER,
            'status' => FlashcardService::CORRECT_STATUS
        ]);
    }

    public static function createIncorrectAnsweredFlashcard(): Flashcard | Practice
    {
        return Flashcard::create([
            'question' => self::QUESTION,
            'answer' => self::ANSWER
        ])->practices()->create([
            'user_id' => FlashcardService::USER_ID,
            'user_answer' => "A",
            'status' => FlashcardService::INCORRECT_STATUS
        ]);
    }
}
