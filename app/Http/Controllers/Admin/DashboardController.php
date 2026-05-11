<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $todos = Todo::with('user')
            ->latest()
            ->get();

        $users = User::latest()
            ->get();

        return view('admin.dashboard', compact('todos', 'users'));
    }
}
