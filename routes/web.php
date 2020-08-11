<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

$vimCommands = [
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
    // 'macros' => [],
    // 'cutAndPaste' => [],
    // 'indentText' => [],
    // 'markingTextVisualMode' => [],
    // 'exiting' => [],
    // 'searchAndReplace' => [],
    // 'registers' => [],
    // 'insertMode' => [],
];

Route::get('/', function () use ($vimCommands) {
    return view('home', ['vimCommands' => $vimCommands]);
});

Route::get('search', function () {
    return [];
});

Route::get('search/{query}', function ($query) use ($vimCommands)  {
    $results = [];
    foreach ($vimCommands as $section) {
        foreach ($section['commands'] as $command) {
            if (Str::contains(Str::lower($command['description']), Str::lower($query))) {
                $results[] = $command;
            }
        }
    }

    return $results;
});