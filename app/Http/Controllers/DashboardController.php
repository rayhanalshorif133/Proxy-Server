<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = 0;
        $departments = 0;
        $issues = 0;
        $rooms = 0;
        $devices = 0;
        $shifts = 0;
        return view('dashboard', compact('users', 'departments', 'issues', 'rooms', 'devices', 'shifts'));
    }
}
