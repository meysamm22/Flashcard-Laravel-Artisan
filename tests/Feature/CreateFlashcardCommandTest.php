<?php

namespace Tests\Feature;

use App\Models\Flashcard;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateFlashcardCommandTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *
     * @return void
     */
    public function test_successfully_create_flashcard()
    {

         $this->artisan('flashcard:create')
            ->expectsQuestion(__("flashcard.create.question"), 'Q1')
            ->expectsQuestion(__("flashcard.create.answer"), 'PHP')
            ->expectsOutputToContain(__('flashcard.create.created'))
            ->assertExitCode(0);

    }

}
