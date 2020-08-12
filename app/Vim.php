<?php

namespace App;

class Vim {
    public static $commands = [
        [
            'section' => 'Editing',
            'commands' => [
                ['command' => 'i', 'description' => 'insert'],
                ['command' => 'a', 'description' => 'append'],
            ],
        ],
        [
            'section' => 'Navigating',
            'commands' => [
                    ['command' => 'j', 'description' => 'move down'],
                    ['command' => 'k', 'description' => 'move up'],
                    ['command' => 'l', 'description' => 'move right'],
                    ['command' => 'h', 'description' => 'move left'],
            ],
        ],
        [
            'section' => 'Exiting',
            'commands' => [
                ['command' => ':qa', 'description' => 'Close all files'],
                ['command' => ':qa!', 'description' => 'Close all files and abandon changes'],
                ['command' => ':w', 'description' => 'Save'],
                ['command' => ':wq', 'description' => 'Save and close file'],
                ['command' => ':x', 'description' => 'Save and close file'],
                ['command' => ':q', 'description' => 'Close file'],
                ['Close file and abandon changes', 'command' => ':q!', 'description' => 'Close file and abandon changes'],
                ['command' => 'ZZ', 'description' => 'Save and quit'],
                ['command' => 'ZQ', 'description' => 'Quit without checking changes'],
            ],
        ],
    ];
}