<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$vimCommands = [
    'global' => [],
    'editing' => [],
    'cursorMovement' => [],
    'macros' => [],
    'cutAndPaste' => [],
    'indentText' => [],
    'markingTextVisualMode' => [],
    'exiting' => [],
    'searchAndReplace' => [],
    'registers' => [],
    'insertMode' => [],
];

Route::get('/', function () {
    return view('home');
});

Route::get('search', function () use ($vimCommands)  {
    dd($vimCommands);
});