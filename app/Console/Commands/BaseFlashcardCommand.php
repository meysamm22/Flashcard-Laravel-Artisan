<?php


namespace App\Console\Commands;


use App\Services\FlashcardService;

trait BaseFlashcardCommand
{

    /**
     *
     * @var FlashcardService
     */
    protected FlashcardService $flashcardService;

    public function __construct(FlashcardService $flashcardService)
    {
        parent::__construct();
        $this->flashcardService = $flashcardService;
    }

}
