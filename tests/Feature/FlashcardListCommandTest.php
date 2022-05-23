<?php

namespace Tests\Feature;

use App\Models\Flashcard;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FlashcardListCommandTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *
     * @return void
     */
    public function test_flashcard_list()
    {
       Flashcard::create([
            'question' => 'Q1',
            'answer' => 'A1'
        ]);
         $this->artisan('flashcard:list')
             ->expectsTable(['Question', 'Answer'], [['Q1', 'A1']])
             ->expectsQuestion(__('flashcard.menu.welcome'), 5)
            ->assertExitCode(0);

    }

}
