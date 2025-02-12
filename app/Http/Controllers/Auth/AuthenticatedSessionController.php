<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $validated = $request->validated([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);
    //     if (Auth::attempt([
    //         'email' => $validated['email'],
    //         'password' => $validated['password'],
    //     ])) {
    //         $user = Auth::user();
    //         if ($user->utype === 'ADM') {
    //             return redirect()->route('admin.index');
    //         } else {
    //             return redirect()->route('user.index');
    //         }
    //     }
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('main', absolute: false));
    // }
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Authentication passed, regenerate session for security
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on user type
            if ($user->utype === 'ADM') {
                return redirect()->route('admin.index'); // Admin dashboard
            } else {
                return redirect()->route('user.index'); // User dashboard
            }
        }

        // If authentication failed, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
