$(function () {
    let taskChart = null;

    function initChart(data) {
        const ctx = document.getElementById('taskOverviewChart').getContext('2d');

        if (taskChart) {
            taskChart.destroy();
        }

        taskChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.timelineData.labels,
                datasets: [{
                    label: 'Tasks Created',
                    data: data.timelineData.data,
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: '#f1f5f9'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    function fetchChartData(period = '7days') {
        $.ajax({
            url: "/admin/dashboard/chart-data",
            type: "GET",
            data: {
                period: period
            },
            success: function (response) {
                initChart(response);
            },
            error: function (xhr) {
                console.error("Error fetching chart data:", xhr);
            }
        });
    }

    // Initial load
    fetchChartData();

    // Handle period change
    $('#chartPeriodSelect').on('change', function () {
        const period = $(this).val();
        fetchChartData(period);
    });
});