<x-layouts.app :title="__('Attendance List')">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Attendance Records</h1>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('attendance.list') }}" class="flex gap-4 mb-6">
            <!-- Student Filter -->
            <select name="student_id" class="border rounded px-3 py-2">
                <option value="">All Students</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" 
                        {{ request('student_id') == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>

            <!-- Month Filter -->
            <select name="month" class="border rounded px-3 py-2">
                <option value="">All Months</option>
                @foreach(range(1,12) as $m)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ date('F', mktime(0,0,0,$m,1)) }}
                    </option>
                @endforeach
            </select>

            <!-- Year Filter -->
            <select name="year" class="border rounded px-3 py-2">
                <option value="">All Years</option>
                @foreach(range(date('Y')-5, date('Y')) as $y)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Filter
            </button>
        </form>

        <!-- Attendance Table -->
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">#</th>
                    <th class="border px-4 py-2 text-left">Student</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td class="border px-4 py-2">{{ $attendance->id }}</td>
                        <td class="border px-4 py-2">{{ $attendance->student->name }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                        <td class="border px-4 py-2">
                            @if($attendance->status)
                                <span class="text-green-600 font-semibold">Present</span>
                            @else
                                <span class="text-red-600 font-semibold">Absent</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $attendance->remarks ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">
                            No attendance records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $attendances->appends(request()->query())->links() }}
        </div>

        <div class="flex gap-4 mb-4">
            <a href="{{ route('attendance.export.excel') }}"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Export Excel
            </a>
            <a href="{{ route('attendance.export.pdf') }}"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Export PDF
            </a>
        </div>

    </div>
</x-layouts.app>