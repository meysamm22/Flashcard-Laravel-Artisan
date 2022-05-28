## Meysam Zarei Home Assignment

First of all, it is my pleasure that I was selected for this step of the interview process.
I have accomplished this task with considering the below concepts:

- A separated service has been considered for flashcards to inject it in different layers
- Variety of automation tests have been written (some feature tests for flashcard service and also for command classes)
- A flashcard fixture service has been implemented as a static class to integrate all the fixtures through test cases 
- Each command in the main menu (flashcard:interactive) has been implemented in a separated command class to maintain it easier
- A base class is considered for all flashcard command classes, to centralise functionalities which are same in all of them (like, injection of flashcard service)
- For handling the validations and business layer errors, exception classes have been used.
- All practise functionality are implemented to work with different user, but as it is mentioned in the requirements of the task there is no need to implement user auth, a specific const variable has been considered for the to determine who is the current user.
- The application has been implemented in multi-language way. 

## How to run:
1. This app is implemented on the laravel sail, so it is so easy to run it by only the ```./vendor/bin/sail up -d```
2. The database structure are considered in migration files, so by running the ```./vendor/bin/sail artisan migrate``` the database will be migrated. Moreover, the last version of sql dump has been added to the main directory
3. By running `./vendor/bin/sail artisan flashcard:interactive` main menu will be shown.
4. All of the application tests will be run by `./vendor/bin/sail test`

