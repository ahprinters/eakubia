<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Show the create form for a given step.
     */
    public function create(Request $request)
    {
        // step parameter (default = 1)
        $step = $request->get('step', 1);

        return view('students.partials.create', compact('step'));
    }

    /**
     * Handle step-wise saving (Save & Forward).
     */
    public function forward(Request $request, $step)
    {
        // প্রতিটি ধাপে আলাদা validation rules
        $rules = [];

        switch ($step) {
            case 1: // ব্যক্তিগত তথ্য
                $rules = [
                    'name'   => 'required|string|max:255',
                    'email'  => 'required|email|unique:students,email',
                    'phone'  => 'required|string|max:15',
                    'gender' => 'required|in:male,female',
                ];
                break;

            case 2: // অভিভাবকের তথ্য
                $rules = [
                    'guardian_name' => 'required|string|max:255',
                    'guardian_phone' => 'required|string|max:15',
                ];
                break;

            case 3: // একাডেমিক ও ক্যাটাগরি
                $rules = [
                    'class' => 'required|string|max:50',
                    'category' => 'nullable|string|max:100',
                ];
                break;

            case 4: // পূর্ব প্রতিষ্ঠানের তথ্য
                $rules = [
                    'previous_school' => 'nullable|string|max:255',
                ];
                break;

            case 5: // অঙ্গীকার নামা
                $rules = [
                    'commitment' => 'required|string',
                ];
                break;

            case 6: // অফিস কর্তৃক পূরণীয়
                $rules = [
                    'office_note' => 'nullable|string|max:500',
                ];
                break;

            case 7: // ডকুমেন্ট আপলোড
                $rules = [
                    'documents.*' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
                ];
                break;
        }

        $validated = $request->validate($rules);

        // প্রতিটি ধাপের ডেটা session এ সংরক্ষণ করো
        session()->put("student_step_$step", $validated);

        // পরবর্তী ধাপে redirect করো
        return redirect()->route('students.create', ['step' => $step + 1]);
    }

    /**
     * Final store method (last step).
     */
    public function store(Request $request)
    {
        // সব step এর ডেটা session থেকে merge করো
        $data = [];
        for ($i = 1; $i <= 7; $i++) {
            $data = array_merge($data, session()->get("student_step_$i", []));
        }

        // Student create
        Student::create($data);

        // সব session clear করো
        for ($i = 1; $i <= 7; $i++) {
            session()->forget("student_step_$i");
        }

        return redirect()
            ->route('students.create')
            ->with('success', 'Student added successfully!');
    }
}