<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   public function index(Request $request)
{
    $query = Attendance::with('student');

    if ($request->filled('date')) {
        $query->whereDate('date', $request->date);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $attendances = $query->orderBy('date', 'desc')->paginate(10);

    // আজকের summary
    $today = Carbon::today();
    $todayTotal   = Attendance::whereDate('date', $today)->count();
    $todayPresent = Attendance::whereDate('date', $today)->where('status', true)->count();
    $todayAbsent  = $todayTotal - $todayPresent;
    $todayRate    = $todayTotal > 0 ? round(($todayPresent / $todayTotal) * 100, 2) : 0;

    // গত ৭ দিনের Attendance Rate (Chart এর জন্য)
    $weekLabels = [];
    $weekRates  = [];

    for ($d = 6; $d >= 0; $d--) {
        $date = Carbon::today()->subDays($d);
        $weekLabels[] = $date->format('D');

        $dayTotal   = Attendance::whereDate('date', $date)->count();
        $dayPresent = Attendance::whereDate('date', $date)->where('status', true)->count();

        $weekRates[] = $dayTotal > 0 ? round(($dayPresent / $dayTotal) * 100, 2) : 0;
    }
    // মাসিক Attendance Rate (Chart এর জন্য)
    $months = [];
    $attendanceRates = [];
    for ($m = 1; $m <= 12; $m++) {
        $monthName = Carbon::create()->month($m)->format('F');
        $months[] = $monthName;

        $monthTotal   = Attendance::whereMonth('date', $m)->whereYear('date', now()->year)->count();
        $monthPresent = Attendance::whereMonth('date', $m)->whereYear('date', now()->year)->where('status', true)->count();

        $attendanceRates[] = $monthTotal > 0 ? round(($monthPresent / $monthTotal) * 100, 2) : 0;
    }

    return view('attendance.index', compact(
        'attendances',
        'todayTotal',
        'todayPresent',
        'todayAbsent',
        'todayRate',
        'weekLabels',
        'weekRates',
        'months',
        'attendanceRates'
    ));
}
    public function report()
    {
        $today = Carbon::today();

        // আজকের Attendance Rate
        $todayTotal   = Attendance::whereDate('date', $today)->count();
        $todayPresent = Attendance::whereDate('date', $today)->where('status', true)->count();
        $todayRate    = $todayTotal > 0 ? round(($todayPresent / $todayTotal) * 100, 2) : 0;

        // মাসিক Attendance Rate (Bar Chart)
        $months = [];
        $attendanceRates = [];

        for ($m = 1; $m <= 12; $m++) {
            $monthName = Carbon::create()->month($m)->format('F');
            $months[] = $monthName;

            $monthTotal   = Attendance::whereMonth('date', $m)->whereYear('date', now()->year)->count();
            $monthPresent = Attendance::whereMonth('date', $m)->whereYear('date', now()->year)->where('status', true)->count();

            $attendanceRates[] = $monthTotal > 0 ? round(($monthPresent / $monthTotal) * 100, 2) : 0;
        }

        // গত ৭ দিনের Attendance Rate (Line Chart)
        $weekLabels = [];
        $weekRates  = [];

        for ($d = 6; $d >= 0; $d--) {
            $date = Carbon::today()->subDays($d);
            $weekLabels[] = $date->format('D');

            $dayTotal   = Attendance::whereDate('date', $date)->count();
            $dayPresent = Attendance::whereDate('date', $date)->where('status', true)->count();

            $weekRates[] = $dayTotal > 0 ? round(($dayPresent / $dayTotal) * 100, 2) : 0;
        }

        return view('attendance.report', compact(
            'todayRate',
            'months',
            'attendanceRates',
            'weekLabels',
            'weekRates'
        ));
    }
    public function create()
    {
        // সব student লোড করো
        $students = Student::all();

        // view এ পাঠাও
        return view('attendance.create', compact('students'));
    }

    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'date'       => 'required|date',
        'status'     => 'required|boolean',
        'remarks'    => 'nullable|string|max:255',
    ]);

    Attendance::create([
        'student_id' => $request->student_id,
        'date'       => $request->date,
        'status'     => $request->status,
        'remarks'    => $request->remarks,
    ]);

    return redirect()->route('attendance.index')
                     ->with('success', 'Attendance recorded successfully!');
}

public function edit(Attendance $attendance)
{
    $students = Student::all();
    return view('attendance.edit', compact('attendance', 'students'));
}

public function update(Request $request, Attendance $attendance)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'date'       => 'required|date',
        'status'     => 'required|boolean',
        'remarks'    => 'nullable|string|max:255',
    ]);

    $attendance->update($request->all());

    return redirect()->route('attendance.index')
                     ->with('success', 'Attendance updated successfully!');
}

public function destroy(Attendance $attendance)
{
    $attendance->delete();

    return redirect()->route('attendance.index')
                     ->with('success', 'Attendance deleted successfully!');
}


}