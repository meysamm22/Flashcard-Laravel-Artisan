<?php

return [
    'menu' => [
        'welcome' => 'Welcome to the Flashcard app, please select an action',
        'create' => 'Create a flashcard',
        'list' => 'List all flashcards',
        'practice' => 'Practice',
        'stats' => 'Stats',
        'reset' => 'Reset',
        'exit' => 'Exit',
    ],
    'create' => [
        'question' => "Enter the question, 0 for return to menu ",
        'answer' => "Enter the answer",
        'created' => "The flashcard created."
    ],
    'practice' => [
        'status' => [
            'not_answered' => 'Not answered',
            'incorrect' => 'InCorrect',
            'correct' => 'Correct',
        ],
        'choose_question' => "Please choose a question id, 0 for return to menu",
        'type_answer' => "Please type the answer",
        'selected_question' => "The selected question is: ",
        'not_found_question' => "The question is not found",
        'cannot_answer' => "You cannot answer correct answered questions",
        'answered' => 'Your answer is: ',
        'percentage_comp' => ' is completed.'
    ],
    'stats' =>[
        'questions' => "Count of questions: ",
        'answered' => "Answered questions: %",
        'correct' => "Correct answers: %",
    ],
    'return' => 'Press any key to return',
    'reset' => [
        'confirm' => 'Are you sure to reset all of you practices?',
        'deleted' => 'All your practices have been deleted!'
    ]


];
