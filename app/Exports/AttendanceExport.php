<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection
{
    public function collection()
    {
        return Attendance::with('student')->get()->map(function($attendance) {
            return [
                'ID' => $attendance->id,
                'Student' => $attendance->student->name,
                'Date' => $attendance->date,
                'Status' => $attendance->status ? 'Present' : 'Absent',
                'Remarks' => $attendance->remarks,
            ];
        });
    }
}