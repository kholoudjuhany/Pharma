<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Ensure this points to your User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $redirectTo = '/'; // Change to your desired redirect path after registration

    public function showRegistrationForm()
    {
        return view('auth.register'); // Adjust the view path as necessary
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Fname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'DoB' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:Male,Female'],
            'personal_id' => ['required', 'string', 'max:20'],
            'user_mobile' => ['required', 'string', 'max:15'], // Added validation for mobile number
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'HIC_id' => ['required', 'exists:h_i_c_s,id'], // Ensure the selected HIC exists in the database
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'Fname' => $data['Fname'],
            'Lname' => $data['Lname'],
            'DoB' => $data['DoB'],
            'gender' => $data['gender'],
            'personal_id' => $data['personal_id'],
            'email' => $data['email'],
            'user_mobile' => $data['user_mobile'], // Ensure this is included in the User model
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'HIC_id' => $data['HIC_id'], // Connect to HIC
            'user_role' => 'customer', // Set default user role, can modify as needed
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Login the user after registration
        auth()->login($user);

        return redirect($this->redirectTo)->with('success', 'Registration successful!'); // Success message after registration
    }
}

