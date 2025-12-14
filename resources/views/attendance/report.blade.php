<x-layouts.app :title="__('Attendance Report')">
    <div class="space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">Attendance Report</h1>

        <!-- Today’s Rate -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Today’s Attendance</h2>
            <p class="text-3xl font-bold">{{ $todayRate }}%</p>
            <p class="text-sm text-gray-500">Present ratio based on today’s records</p>
        </div>

        <!-- Monthly Chart -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Monthly Attendance ({{ now()->year }})</h2>
            <canvas id="monthlyAttendanceChart" class="w-full h-64"></canvas>
        </div>

        <!-- Weekly Trend -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Last 7 Days</h2>
            <canvas id="weeklyAttendanceChart" class="w-full h-64"></canvas>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Monthly Attendance Chart
            new Chart(document.getElementById('monthlyAttendanceChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'Attendance Rate (%)',
                        data: @json($attendanceRates),
                        backgroundColor: 'rgba(99, 102, 241, 0.7)',
                        borderRadius: 6
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true, max: 100 } } }
            });

            // Weekly Attendance Chart
            new Chart(document.getElementById('weeklyAttendanceChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: @json($weekLabels),
                    datasets: [{
                        label: 'Attendance Rate (%)',
                        data: @json($weekRates),
                        borderColor: 'rgba(16, 185, 129, 0.9)',
                        backgroundColor: 'rgba(16, 185, 129, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: { responsive: true, scales: { y: { beginAtZero: true, max: 100 } } }
            });
        });
    </script>
    @endpush
</x-layouts.app>