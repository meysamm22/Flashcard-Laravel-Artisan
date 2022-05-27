<?php

namespace App\Console\Commands;

use App\Services\FlashcardService;
use Illuminate\Console\Command;

class FlashcardList extends Command
{
    use BaseFlashcardCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The list of all flashcards will be shown by this command';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->table(
            ['Question', 'Answer'],
            $this->flashcardService->list()
        );

        $this->call("flashcard:interactive");

    }
}
