<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ddd; padding:8px; text-align:left; }
        th { background:#f4f4f4; }
    </style>
</head>
<body>
    <h2>Attendance Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                    <td>{{ $attendance->status ? 'Present' : 'Absent' }}</td>
                    <td>{{ $attendance->remarks ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>