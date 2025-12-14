<div class="h-64 flex items-center justify-center text-gray-500">
    <!-- Future chart will go here -->
    <div>
    <canvas id="attendanceChart" class="w-full h-64"></canvas>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('attendanceChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels), // যেমন: ['Week 1', 'Week 2', 'Week 3']
                    datasets: [{
                        label: 'Attendance Rate (%)',
                        data: @json($data), // যেমন: [80, 75, 90]
                        backgroundColor: 'rgba(99, 102, 241, 0.7)', // Tailwind Indigo
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
        });
    </script>
    @endpush
</div>
</div>