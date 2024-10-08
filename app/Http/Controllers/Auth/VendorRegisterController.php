<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class VendorRegisterController extends Controller
{
    public function showRegistrationForm()
    {

        //if user already logged in, redirect to dashboard
        if (auth()->check()) {
            return Inertia::location(route('dashboard'));
            //return redirect()->route('dashboard');
        }else{
            return inertia('Auth/VendorRegister');
        }


    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Vendor');

        // Authenticate the user under the vendor guard
        auth()->guard('vendor')->login($user);

        // Login user
        auth()->login($user);

        return Inertia::location(route('dashboard'));
    }
}
