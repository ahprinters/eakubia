<x-layouts.app :title="__('Reports')">
    <div class="space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">School Reports</h1>

        <!-- Attendance Report Chart -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Attendance Report</h2>
            <canvas id="attendanceChart" class="w-full h-64"></canvas>
        </div>

        <!-- Student Distribution Chart -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Student Distribution</h2>
            <canvas id="studentDistributionChart" class="w-full h-64"></canvas>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attendance Chart (Bar)
            const ctxAttendance = document.getElementById('attendanceChart').getContext('2d');
            new Chart(ctxAttendance, {
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
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });

            // Student Distribution Chart (Pie)
            const ctxDistribution = document.getElementById('studentDistributionChart').getContext('2d');
            new Chart(ctxDistribution, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Students',
                        data: [{{ $maleCount }}, {{ $femaleCount }}],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)', // Blue
                            'rgba(244, 114, 182, 0.7)' // Pink
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-layouts.app>