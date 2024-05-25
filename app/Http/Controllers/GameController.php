<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function oddEvenVisit(Request $request) {
        return Inertia::render('Game/OddEven');
    }
    public function graphVisit(Request $request) {
        return Inertia::render('Game/Graph');
    }
    public function mineVisit(Request $request) {
        return Inertia::render('Game/Mine');
    }
}
