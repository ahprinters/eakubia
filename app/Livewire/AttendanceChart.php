<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;

class AttendanceChart extends Component
{
    public function render()
    {
        // উদাহরণস্বরূপ সপ্তাহভিত্তিক ডাটা
        $labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        $data = [
            Attendance::whereBetween('date', [now()->startOfMonth(), now()->startOfMonth()->addDays(7)])
                ->where('status', true)->count(),
            Attendance::whereBetween('date', [now()->startOfMonth()->addDays(8), now()->startOfMonth()->addDays(14)])
                ->where('status', true)->count(),
            Attendance::whereBetween('date', [now()->startOfMonth()->addDays(15), now()->startOfMonth()->addDays(21)])
                ->where('status', true)->count(),
            Attendance::whereBetween('date', [now()->startOfMonth()->addDays(22), now()->endOfMonth()])
                ->where('status', true)->count(),
        ];

        return view('livewire.attendance-chart', compact('labels', 'data'));
    }
}