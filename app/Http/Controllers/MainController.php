<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class MainController extends Controller
{
    public function __construct()
    {
    }

    function mainController(Request $request): View|InertiaResponse
    {
//        $announcement = Announcement::query()->with('user')->orderByDesc('created_at')->get();
        return Inertia::render('Welcome', [
//            'announcement' => $announcement,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
