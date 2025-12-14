<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-6">

        <!-- 🔍 Top Bar: Search + Admin -->
        <div class="flex items-center justify-between">
            <!-- Search Bar -->
            <div class="relative w-full max-w-md">
                <input
                    type="text"
                    placeholder="Search..."
                    class="w-full pl-10 pr-20 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <x-icon name="heroicon-s-magnifying-glass" class="w-5 h-5" />
                </div>
                <div class="absolute right-3 top-2.5 text-xs text-gray-500">
                    ⌘F
                </div>
            </div>

            <!-- Admin Controls -->
            <div class="flex items-center gap-4 ml-6">
                <button
                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                >
                    <x-icon name="heroicon-s-plus" class="w-5 h-5" />
                    Add Gateway
                </button>

                <div class="flex items-center gap-2">
                    <img
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                        alt="Admin Avatar"
                        class="w-10 h-10 rounded-full object-cover"
                    />
                    <div class="text-sm">
                        <div class="font-semibold">{{ auth()->user()->name }}</div>
                        <div class="text-gray-500 text-xs">Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🧮 Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- 🟦 Left Side: Stats + Attendance -->
            <div class="lg:col-span-8 space-y-6">
                <x-dashboard.welcome-banner 
                    :user="auth()->user()" 
                    message="Here's a quick overview of the school's performance."
                    :newStudentsToday="$newStudentsToday"
                    :newTeachersToday="$newTeachersToday"
                    :todayFees="$todayFees"
                    :todayRate="$todayRate"
                />

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-dashboard.card icon="academic-cap" label="Total Students" :value="$totalStudents" status="info" />
                    <x-dashboard.card icon="users" label="Active Students" :value="$activeStudents" status="success" />
                    <x-dashboard.card icon="users" label="Total Teachers" :value="$totalTeachers" status="success" />
                    <x-dashboard.card icon="chart-bar" label="Attendance Rate" :value="$attendanceRate . '%'" status="info" :progress="$attendanceRate" description="Overall records" />
                    <x-dashboard.card icon="chart-bar" label="Today's Attendance" :value="$todayRate . '%'" status="success" :progress="$todayRate" description="Based on {{ $todayTotal }} records" />
                    <x-dashboard.card icon="currency-bangladeshi" label="Monthly Fees" :value="$monthlyFees . ' BDT'" status="warning" />
                    <x-dashboard.card icon="currency-bangladeshi" label="Today's Fees" :value="$todayFees . ' BDT'" status="danger" />
                    <x-dashboard.card icon="academic-cap" label="New Students Today" :value="$newStudentsToday" status="info" />
                    <x-dashboard.card icon="users" label="New Teachers Today" :value="$newTeachersToday" status="success" />
                </div>

                <!-- Attendance Chart -->
                <x-dashboard.section title="Attendance Report" icon="heroicon-s-chart-bar">
                    <livewire:attendance-chart />
                </x-dashboard.section>
            </div>

            <!-- 🟩 Right Side: Distribution + Activities -->
            <div class="lg:col-span-4 space-y-6">
                <x-dashboard.section title="Student Distribution" icon="heroicon-s-users">
                    <livewire:student-distribution-chart />
                </x-dashboard.section>

                <x-dashboard.section title="Recent Activities" icon="heroicon-s-clock">
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li>🟢 {{ $newStudentsToday }} new student admission today</li>
                        <li>🟢 {{ $newTeachersToday }} new teacher joined today</li>
                        <li>🟢 Fee payments received today: {{ $todayFees }} BDT</li>
                    </ul>
                </x-dashboard.section>
            </div>
        </div>
    </div>
</x-layouts.app>