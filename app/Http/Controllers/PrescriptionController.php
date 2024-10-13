<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    






    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'pre_details' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Process the photo upload
        if ($request->hasFile('pre_details')) {
            // You may want to define a path for storing the photo
            $path = $request->file('pre_details')->store('prescriptions', 'public');
            
            // Create a new prescription entry in the database
            Prescription::create([
                'status' => 'pending', // Default status
                'pre_details' => $path, // Store the file path
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you! Wait for us to add your medicines. Won\'t take long!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
