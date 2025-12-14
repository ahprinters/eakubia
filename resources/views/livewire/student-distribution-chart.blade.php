<div class="h-64 flex items-center justify-center text-gray-500">
    <div>
    <canvas id="studentDistributionChart" class="w-full h-64"></canvas>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('studentDistributionChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: @json($labels), // যেমন: ['Male', 'Female']
                    datasets: [{
                        label: 'Student Distribution',
                        data: @json($data), // যেমন: [120, 80]
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)', // Blue
                            'rgba(244, 114, 182, 0.7)' // Pink
                        ],
                        borderWidth: 1
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
</div>
</div>