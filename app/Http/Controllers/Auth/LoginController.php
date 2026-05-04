<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('marketing')) {
            return redirect()->route('marketing.dashboard');
        }
        if ($user->hasRole('ceo')) {
            return redirect()->route('ceo.dashboard');
        }
        return redirect()->route('client.dashboard');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('home');
    }
}
