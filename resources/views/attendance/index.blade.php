<x-layouts.app :title="__('Attendance List')">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-xl font-bold mb-4">Attendance Records</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('attendance.index') }}" class="mb-4 flex space-x-4">
        <input type="date" name="date" value="{{ request('date') }}" class="border rounded px-3 py-2 text-black">
        <select name="status" class="border rounded px-3 py-2 text-black">
            <option value="">All</option>
            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Present</option>
            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Absent</option>
        </select>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Filter
        </button>
    </form>

    <!-- Attendance Table -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Student</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Remarks</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attendances as $attendance)
                <tr>
                    <td class="border px-4 py-2">{{ $attendance->student->name }}</td>
                    <td class="border px-4 py-2">{{ $attendance->date }}</td>
                    <td class="border px-4 py-2">
                        @if($attendance->status)
                            <span class="text-green-600 font-semibold">Present</span>
                        @else
                            <span class="text-red-600 font-semibold">Absent</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $attendance->remarks }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <!-- Edit -->
                        <a href="{{ route('attendance.edit', $attendance->id) }}" 
                           class="text-blue-500 hover:underline">Edit</a>

                        <!-- Delete -->
                        <form action="{{ route('attendance.destroy', $attendance->id) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:underline"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
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
        {{ $attendances->links() }}
    </div>

    <!-- Quick Summary -->
    <div class="mt-6 bg-gray-50 p-4 rounded shadow">
        <h2 class="font-bold mb-2">Today's Summary</h2>
        <p>Total: {{ $todayTotal }}</p>
        <p>Present: {{ $todayPresent }}</p>
        <p>Absent: {{ $todayAbsent }}</p>
        <p>Rate: {{ $todayRate }}%</p>
    </div>

</x-layouts.app>