<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class ReportController extends Controller
{
    public function index()
    {
        // মাসভিত্তিক Attendance Rate (উদাহরণস্বরূপ)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
        $attendanceRates = [];

        foreach ($months as $month) {
            $rate = Attendance::whereMonth('date', date('m', strtotime($month)))
                ->whereYear('date', date('Y'))
                ->where('status', true)
                ->count();

            $total = Attendance::whereMonth('date', date('m', strtotime($month)))
                ->whereYear('date', date('Y'))
                ->count();

            $attendanceRates[] = $total > 0 ? round(($rate / $total) * 100, 2) : 0;
        }

        // Student Distribution (Male vs Female)
        $maleCount = Student::where('gender', 'male')->count();
        $femaleCount = Student::where('gender', 'female')->count();

        return view('reports.index', [
            'months' => $months,
            'attendanceRates' => $attendanceRates,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
        ]);
    }
}