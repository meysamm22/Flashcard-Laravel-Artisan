<?php

namespace App\Console\Commands;

use App\Services\FlashcardService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

class PracticeFlashcard extends Command{


    /**
     *
     * @var FlashcardService
     */
    private $flashcardService;

    public function __construct(FlashcardService $flashcardService)
    {
        parent::__construct();
        $this->flashcardService = $flashcardService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashcard:practice';

    /**
     *
     * @var string
     */
    protected $description = 'This Command runs the practice process';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Throwable
     */
    public function handle()
    {
        $table = new Table($this->output);
        $table->setHeaders(['ID','Question','Status']);
        $table->addRows($this->flashcardService->listWithPracticeStatus());
        $table->setFooterTitle("%".$this->flashcardService->getPercentageOfCompletion().__("flashcard.practice.percentage_comp"));
        $table->render();
        $questionId = $this->ask(__("flashcard.practice.choose_question"));
        try {
            $flashcard = $this->flashcardService->fetchFlashcardForPractice($questionId);
            $this->info(__("flashcard.practice.selected_question").$flashcard->question);
            $answer = $this->ask(__("flashcard.practice.type_answer"));
            $status = $this->flashcardService->answerQuestion($flashcard, $answer);
            $this->info(__('flashcard.practice.answered') . __('flashcard.practice.status.'.$status));
            $this->call('flashcard:practice');

        }catch (\Exception $e){
            $this->error($e->getMessage());
            $this->ask(__("flashcard.practice.not_found_question"));
            $this->call("flashcard:practice");
        }


    }
}
