<?php

namespace App\Console\Commands;

use App\Services\FlashcardService;
use Illuminate\Console\Command;

class FlashcardResetPractice extends Command
{
    use BaseFlashcardCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command reset all of the practices of a user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm(__("flashcard.reset.confirm"), true)) {
            $this->flashcardService->reset();
            $this->info(__("flashcard.reset.deleted"));
            $this->ask(__("flashcard.return"));
            $this->call('flashcard:interactive');
        }
    }
}
