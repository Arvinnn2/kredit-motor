<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\JenisMotor;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMotor      = Motor::count();
        $totalJenisMotor = JenisMotor::count();
        $totalUsers      = User::count();

        return view('admin.dashboard', compact('totalMotor', 'totalJenisMotor', 'totalUsers'));
    }
}
