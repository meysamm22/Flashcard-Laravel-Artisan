<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class flashcardActions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:interactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command shows the main menu.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $selectedMenuItem = $this->choice(
            __("flashcard.menu.welcome"),
            [
                __("flashcard.menu.create"),
                __("flashcard.menu.list"),
                __("flashcard.menu.practice"),
                __("flashcard.menu.stats"),
                __("flashcard.menu.reset"),
                __("flashcard.menu.exit")
            ],
            0,
            $maxAttempts = null,
            $allowMultipleSelections = false
        );


    }
}
