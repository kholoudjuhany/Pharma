<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Make sure to import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $redirectTo = '/'; // Change to your desired redirect path after login

    public function showLoginForm()
    {
        return view('auth.login'); // Adjust the view path as necessary
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Normalize the email to lowercase
        $email = strtolower(trim($request->email));
    
        // Debug: Log the normalized email
        \Log::info('Normalized email', ['email' => $email]);
    
        // Attempt to retrieve the user
        $user = User::where('email', $email)->first();
    
        // Debug: Log the retrieved user or not found
        if ($user) {
            \Log::info('User found', ['user_id' => $user->id]);
        } else {
            \Log::error('User not found', ['email' => $email]);
        }
    
        // Check password match if user is found
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('main');
        } else {
            \Log::error('Login failed', ['email' => $email, 'attempted_password' => $request->password]);
        }
    
        return back()->withErrors([
            'email' => 'Wrong email or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/'); // Redirect to your desired path after logout
    }
}
