<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('search/{query}', 'SearchController@index');