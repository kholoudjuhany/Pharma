<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HIC;

class UserController extends Controller
{
    
    public function index()
{
    $users = User::all(); 
    return view('dashboard.users', ['users' => $users]);
}


    




    public function create()
    {
        // return view('');
    }



    




    public function store(Request $request)
    {
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'DoB' => 'required|date',
            'gender' => 'required|in:Female,Male',
            'personal_id' => 'required|string|unique:users,personal_id',
            'email' => 'required|email|unique:users,email',
            'user_mobile' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'user_role' => 'required|in:customer,doctor',
            'address' => 'required|string|max:255',
            'HIC_id' => 'required|exists:h_i_c_s,id', // Make sure the HIC_id exists
        ]);
        
        $user = new User();
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->DoB = $request->DoB;
        $user->gender = $request->gender;
        $user->personal_id = $request->personal_id;
        $user->email = $request->email;
        $user->user_mobile = $request->user_mobile;
        $user->password = Hash::make($request->password); // Hash the password
        $user->user_role = $request->user_role;
        $user->address = $request->address;
        $user->HIC_id = $request->HIC_id;
        $user->save();
        
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    






    
    public function edit(User $user)
    {
        $hics = HIC::all();
        return view('dashboard.edit_user', compact('user', 'hics'));
    }

    







    public function update(Request $request, $id)
    {
        $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'DoB' => 'required|date',
            'gender' => 'required|string',
            'personal_id' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'user_mobile' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'HIC_id' => 'required|integer',
            'user_role' => 'required|string',
        ]);
        
        $user = User::find($id);
        
        if ($user) {
            $user->Fname = $request->Fname;
            $user->Lname = $request->Lname;
            $user->DoB = $request->DoB;
            $user->gender = $request->gender;
            $user->personal_id = $request->personal_id;
            $user->email = $request->email;
            $user->user_mobile = $request->user_mobile;
            $user->address = $request->address;
            $user->HIC_id = $request->HIC_id;
            $user->user_role = $request->user_role;
            $user->save();
            
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }







  
    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete(); 
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
    

}
