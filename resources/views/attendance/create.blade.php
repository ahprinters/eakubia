<x-layouts.app :title="__('Add Attendance')">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-xl font-bold mb-4">Record Attendance</h1>

        <form action="{{ route('attendance.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Student -->
            <div>
                <label for="student_id" class="block text-sm font-medium text-gray-700">Student</label>
                <select name="student_id" id="student_id"
                        class="w-full border rounded px-3 py-2 text-black" required>
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}"
                            {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date"
                       value="{{ old('date', now()->toDateString()) }}"
                       class="w-full border rounded px-3 py-2 text-black" required>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                        class="w-full border rounded px-3 py-2 text-black" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Present</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>

            <!-- Remarks -->
            <div>
                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                <input type="text" name="remarks" id="remarks"
                       value="{{ old('remarks') }}"
                       placeholder="Optional note"
                       class="w-full border rounded px-3 py-2 text-black placeholder-gray-400">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Save Attendance
            </button>
        </form>
    </div>
</x-layouts.app>