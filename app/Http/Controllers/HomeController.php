<?php

namespace App\Http\Controllers;

use App\Vim;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['vimCommands' => Vim::$commands]);
    }
}
