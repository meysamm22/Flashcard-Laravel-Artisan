<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Validation\ValidationException;

class CreateFlashcard extends Command
{
    use BaseFlashcardCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new flashcard';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Throwable
     */
    public function handle()
    {
        $input['question'] = $this->ask(__("flashcard.create.question"));
        if ($input['question'] == 0)
        {
            $this->call("flashcard:interactive");
            return 0;
        }
        $input['answer'] = $this->ask(__("flashcard.create.answer"));

        try {
            $this->flashcardService->create($input);
            $this->info(__("flashcard.create.created"));
        }catch (ValidationException $e){
            $this->error($e->getMessage());
        }

    }

}
