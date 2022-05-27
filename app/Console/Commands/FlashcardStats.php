<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FlashcardStats extends Command
{
    use BaseFlashcardCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Statistics of flashcards';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stats = $this->flashcardService->stats();
        $this->info(__("flashcard.stats.questions"). $stats['Questions']);
        $this->info(__("flashcard.stats.answered"). $stats['Answered']);
        $this->info(__("flashcard.stats.correct"). $stats['Correct']);
        $this->ask(__("flashcard.return"));
        $this->call('flashcard:interactive');
    }
}
