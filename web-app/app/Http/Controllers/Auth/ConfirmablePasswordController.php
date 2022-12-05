<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Nette\Schema\ValidationException;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show teh confirm password view
     *
     * @return \Illuminate\View\View
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */

    public function store(Request $request)
    {
        if (!Auth::guard('web')->validate([

        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
