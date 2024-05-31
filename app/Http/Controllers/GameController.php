<?php

namespace App\Http\Controllers;

use App\Events\HolzzakUserBetting;
use App\Events\HolzzakWaitSecondEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
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

    public function oddEvenBetProc(Request $request) {
        $oddEvenForm = $request->validate([
            'type' => 'required'
        ]);
        $username = Auth::user();
        HolzzakUserBetting::dispatch($oddEvenForm,$username);
        return back();
    }
}
