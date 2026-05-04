<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\JenisMotor;
use App\Models\HeroSetting;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('admin'))     return redirect()->route('admin.dashboard');
            if ($user->hasRole('marketing')) return redirect()->route('marketing.dashboard');
            if ($user->hasRole('ceo'))       return redirect()->route('ceo.dashboard');
        }

        $motorUnggulan = Motor::with('jenisMotor')
            ->where('stok', '>', 0)
            ->latest()
            ->take(4)
            ->get();

        $jenisMotor = JenisMotor::withCount('motor')->get();

        $hero = HeroSetting::first();

        return view('home', compact('motorUnggulan', 'jenisMotor', 'hero'));
    }
}
