<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Models\Fee;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Students
        $totalStudents   = Student::count();
        $activeStudents  = Student::where('is_active', true)->count();
        $newStudentsToday = Student::whereDate('created_at', Carbon::today())->count();

        // Teachers
        $totalTeachers   = Teacher::count();
        $newTeachersToday = Teacher::whereDate('created_at', Carbon::today())->count();

        // Attendance Rate (overall)
        $totalAttendanceRecords = Attendance::count();
        $presentCount = Attendance::where('status', true)->count();
        $attendanceRate = $totalAttendanceRecords > 0 
            ? round(($presentCount / $totalAttendanceRecords) * 100, 2) 
            : 0;

        // Today’s Attendance Rate
        $today = Carbon::today();
        $todayTotal   = Attendance::whereDate('date', $today)->count();
        $todayPresent = Attendance::whereDate('date', $today)->where('status', true)->count();
        $todayRate    = $todayTotal > 0 ? round(($todayPresent / $todayTotal) * 100, 2) : 0;

        // Monthly Fees হিসাব
        $monthlyFees = Fee::whereMonth('date', now()->month)
                          ->whereYear('date', now()->year)
                          ->sum('amount');

        // Today’s Fees হিসাব
        $todayFees = Fee::whereDate('date', $today)->sum('amount');

        return view('dashboard', compact(
            'newStudentsToday',
            'newTeachersToday',
            'todayFees',
            'todayRate',
            'totalStudents',
            'activeStudents',
            'totalTeachers',
            'attendanceRate',
            'todayRate',
            'todayTotal',
            'monthlyFees',
            'todayFees'
        ));
    }
}