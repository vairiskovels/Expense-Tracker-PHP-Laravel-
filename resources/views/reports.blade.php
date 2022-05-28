@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="reports" class="main-body">
    @extends('layouts.navbar')

    <main id="reports-section" class="main">
        <div class="reports-wrap">
            <div class="section-header-wrap">
                <h2 class="section-header" id="section-header">Expenses by month</h2>
                <select name="reports-select" id="reports-select">
                    <option value="1" selected>Expenses by month</option>
                    <option value="2">Expenses by category</option>
                    <option value="3">Top 10 expenses this month</option>
                </select>
            </div>
            <div class="report-wrap show" id="expenses-by-month">
                <div class="report-card">
                    <div class="canvas">
                        <canvas id="byMonthTotal" height="420px" width="850px"></canvas>
                    </div>
                </div>
            </div>
            <div class="report-wrap hide" id="expenses-by-category-bar">
                <div class="report-card" id="expenses-by-category-card">
                    <div class="canvas" id="by-category-bar">
                        <canvas id="byMonthCategory" height="420px" width="850px"></canvas>
                    </div>
                </div>
            </div>
            <div class="report-wrap hide" id="top-10-expenses">
                <div class="report-card">
                    <div class="canvas" id="top10-bar">
                        <canvas id="top10" height="420px" width="850px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script>

        const report1 = document.getElementById('byMonthTotal').getContext('2d');
        const report2 = document.getElementById('byMonthCategory').getContext('2d');
        const report3 = document.getElementById('top10').getContext('2d');

        const chart1 = new Chart(report1, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'],
                datasets: [{
                    label: 'Bills',
                    data: [80,70,65,75,80,70,65,75,80,70,65,75],
                    fill: true,
                    backgroundColor: 'rgb(54, 162, 235, .5)',
                    borderColor: 'rgb(54, 162, 235)',
                    tension: 0.1
                }]
            },
            options: {
                // responsive: true,
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        const chart2 = new Chart(report2, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'],
                datasets: [
                    {
                    label: 'Dataset 1',
                    data: [80,70,65,75,80,70,65,75,80,70,65,75],
                    backgroundColor: '#44444480',
                    borderColor: '#444444'
                    },
                    {
                    label: 'Dataset 2',
                    data: [80,70,65,75,80,70,65,75,80,70,65,75],
                    backgroundColor: '#333333',
                    },
                    {
                    label: 'Dataset 3',
                    data: [80,70,65,75,80,70,65,75,80,70,65,75],
                    backgroundColor: '#222222',
                    }
                ],
                borderWidth: 1
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                        layout: {
                            padding: 100
                        }
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        suggestedMin: 0,
                        suggestedMax: 300
                    }
                }
            }
        });
        const chart3 = new Chart(report3, {
            type: 'bar',
            data: {
                labels: ['House bills', 'Internet', 'Groceries', 'Pants', 'Monthly bus ticket', 'Screwdriver', 'Netflix', 'Snacks', 'Bulb', 'Ticket'],
                datasets: [{
                    label: 'Top 10',
                    data: [80,45,30,25,15,7, 6.99,3,2.5,1],
                    fill: true,
                    backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(255, 205, 86, 1)'
                    ],
                    tension: 0.1
                }]
            },
            options: {
                // responsive: true,
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: 100,
                        ticks: {
                            beginAtZero: true
                        }
                    }
                },
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 0,
                        to: 10,
                        loop: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        </script>
</body>
@endsection