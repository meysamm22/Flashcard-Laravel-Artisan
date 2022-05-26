<?php

return [
    'menu' => [
        'welcome' => 'Welcome to the Flashcard app, please select an action:',
        'create' => 'Create a flashcard',
        'list' => 'List all flashcards',
        'practice' => 'Practice',
        'stats' => 'Stats',
        'reset' => 'Reset',
        'exit' => 'Exit',
    ],
    'create' => [
        'question' => "Enter the question: ",
        'answer' => "Enter the answer :",
        'created' => "The flashcard created."
    ],
    'practice' => [
        'status' => [
            'not_answered' => 'Not answered',
            'incorrect' => 'InCorrect',
            'correct' => 'Correct',
        ],
        'choose_question' => "Please choose a question",
        'type_answer' => "Please type the answer",
        'selected_question' => "The selected question is: ",
        'not_found_question' => "The question is not found, press any key to return",
        'cannot_answer' => "You cannot answer correct answered questions, press any key to return",
        'answered' => 'Your answer is: ',
        'percentage_comp' => ' is completed.'
    ],
    'stats' =>[
        'questions' => "Count of questions: ",
        'answered' => "Answered questions: %",
        'correct' => "Correct answers: %",
    ],
    'return' => 'Press any key to return'


];
