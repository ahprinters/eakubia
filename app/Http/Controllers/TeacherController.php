<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
 

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:teachers,email',
            'subject'  => 'required|string|max:100',
            'phone'  => 'required|string|max:15',
        ]);
        // Code to store a new teacher using $validated data
        // For example:
        Teacher::create($validated);
        return redirect()
            ->route('teachers.create')
            ->with('success', 'Teacher added successfully!');   
    }
}
