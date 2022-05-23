<?php


namespace App\Console\Commands;


class CommandHelper
{

    public static function clearConsole(){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            system('cls');
        } else {
            system('clear');
        }
    }

}
