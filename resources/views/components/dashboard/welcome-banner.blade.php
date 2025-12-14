@props([
    'user',
    'message' => null,
    'newStudentsToday' => 0,
    'newTeachersToday' => 0,
    'todayFees' => 0,
    'todayRate' => 0,
])

<div class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl p-6 shadow-lg overflow-hidden">
    <!-- Decorative Icon -->
    <div class="absolute top-4 right-4 opacity-20">
        <x-icon name="heroicon-s-academic-cap" class="w-16 h-16" />
    </div>

    <!-- Content -->
    <div class="relative z-10">
        <h1 class="text-2xl font-bold mb-2">
            Welcome, {{ $user?->name ?? 'Guest' }} 👋
        </h1>
        <p class="text-sm mb-4">{{ $message ?? 'Welcome to the dashboard.' }}</p>

        <!-- CTA Button -->
        <a href="{{ route('reports.index') }}"
           class="inline-flex items-center gap-2 bg-white text-indigo-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-50 transition">
            <x-icon name="heroicon-s-chart-bar" class="w-5 h-5" />
            View Full Report
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="relative z-10 mt-6 grid grid-cols-3 gap-4">
        <!-- Add Student -->
        <a href="{{ route('students.create') }}"
           class="flex items-center gap-2 bg-indigo-500 hover:bg-indigo-700 px-3 py-2 rounded-lg text-sm font-medium transition text-white">
            <x-icon name="heroicon-s-user-plus" class="w-5 h-5" />
            Add Student
        </a>

        <!-- Add Teacher -->
        <a href="{{ route('teachers.create') }}"
           class="flex items-center gap-2 bg-indigo-500 hover:bg-indigo-700 px-3 py-2 rounded-lg text-sm font-medium transition text-white">
            <x-icon name="heroicon-s-user-group" class="w-5 h-5" />
            Add Teacher
        </a>

        <!-- Attendance Quick Access -->
        <a href="{{ route('attendance.index') }}"
           class="flex items-center gap-2 bg-green-500 hover:bg-green-700 px-3 py-2 rounded-lg text-sm font-medium transition text-white">
            <x-icon name="heroicon-s-clipboard-document-check" class="w-5 h-5" />
            Attendance
        </a>
    </div>
    
    <!-- Today’s Summary as Stats Cards -->
    <div class="relative z-10 mt-6">
        <h2 class="text-lg font-semibold mb-4 text-white">Today’s Summary</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- New Students -->
            <div class="bg-white bg-opacity-10 rounded-lg p-4 shadow flex flex-col">
                <div class="flex items-center gap-2 text-green-300">
                    <x-icon name="heroicon-s-academic-cap" class="w-6 h-6" />
                    <span class="font-semibold">New Students</span>
                </div>
                <div class="mt-2 text-2xl font-bold text-gray-700">
                    {{ $newStudentsToday }}
                </div>
            </div>

            <!-- New Teachers -->
            <div class="bg-white bg-opacity-10 rounded-lg p-4 shadow flex flex-col">
                <div class="flex items-center gap-2 text-indigo-300">
                    <x-icon name="heroicon-s-user-group" class="w-6 h-6" />
                    <span class="font-semibold">New Teachers</span>
                </div>
                <div class="mt-2 text-2xl font-bold text-gray-700">
                    {{ $newTeachersToday }}
                </div>
            </div>

            <!-- Fee Payments -->
            <div class="bg-white bg-opacity-10 rounded-lg p-4 shadow flex flex-col">
                <div class="flex items-center gap-2 text-yellow-300">
                    <x-icon name="heroicon-s-currency-bangladeshi" class="w-6 h-6" />
                    <span class="font-semibold">Fee Payments</span>
                </div>
                <div class="mt-2 text-2xl font-bold text-gray-700">
                    {{ $todayFees }} BDT
                </div>
            </div>

            <!-- Attendance Rate -->
            <div class="bg-white bg-opacity-10 rounded-lg p-4 shadow flex flex-col">
                <div class="flex items-center gap-2 text-pink-300">
                    <x-icon name="heroicon-s-clipboard-document-check" class="w-6 h-6" />
                    <span class="font-semibold">Attendance Rate</span>
                </div>
                <div class="mt-2 text-2xl font-bold text-gray-700">
                    {{ $todayRate }}%
                </div>
            </div>
        </div>
    </div>
</div>