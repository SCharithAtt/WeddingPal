<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ClientRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return inertia('Auth/ClientRegister');
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

        $user->assignRole('Client');

        // Authenticate the user under the vendor guard
        auth()->guard('client')->login($user);

        Client::create([
            'user_id' => $user->id,
        ]);

        //login user
        auth()->login($user);

        return Inertia::location(route('dashboard'));
    }
}
