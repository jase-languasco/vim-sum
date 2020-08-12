<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Vim;

class SearchController extends Controller
{
    public function index($query = null)
    {
        $results = [];
        foreach (Vim::$commands as $sectionIndex => $section) {
            foreach ($section['commands'] as $commandIndex => $command) {
                if (Str::contains(Str::lower($command['description']), Str::lower($query))) {
                    $command['id'] = $sectionIndex . $commandIndex;
                    $results[] = $command;
                }
            }
        }

        return $results;
    }
}
