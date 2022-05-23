<?php

namespace Tests\Feature;

use App\Services\FlashcardService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class FlashcardServiceTest extends TestCase
{
    use DatabaseMigrations;

    private $flashcardService;

    public function setUp():void{
        parent::setUp();
        $this->flashcardService = new FlashcardService();
    }

    /**
     *
     * @return void
     * @throws \Throwable
     */
    public function test_creating_flashcard_given_invalid_input_should_throw_exception()
    {
        $this->expectException(ValidationException::class);
        $input['question'] = 'Q1';
        $this->flashcardService->create($input);
    }

    /**
     *
     * @return void
     * @throws \Throwable
     */
    public function test_creating_flashcard_given_valid_input_should_return_the_flashcard()
    {
        $input['question'] = 'Q1';
        $input['answer'] = 'A1';
        $result = $this->flashcardService->create($input);
        $this->assertEquals($input['question'], $result->question);
    }
}
