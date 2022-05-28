@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="reports" class="main-body">
    @extends('layouts.navbar')

    <main id="reports-section" class="main">
        <div class="reports-wrap">
            <div class="section-header-wrap">
                <h2 class="section-header" id="section-header">Expenses by months (total)</h2>
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

        var byMonthQuery = {!! json_encode($byMonth) !!};
        var top10 = {!! json_encode($top10) !!};

        const months = ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'];

        var byMonthData = [0,0,0,0,0,0,0,0,0,0,0,0];
        byMonthQuery.forEach(e => {
            byMonthData[e['month']-1] = parseFloat(e['price']);
        });

        var top10Prices = [];
        var top10Names = [];
        var top10Colors = [];
        top10.forEach(e => {
            top10Names.push(e['name']);
            top10Prices.push(e['price']);
            top10Colors.push(e['color']);
        });

        console.log(top10Prices);

        const chart1 = new Chart(report1, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Expenses',
                    data: byMonthData,
                    fill: true,
                    borderColor: '#ff6384',
                    backgroundColor: '#ff638480',
                    tension: 0.2
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: Math.max.apply(Math, byMonthData) * 1.15
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
                labels: top10Names,
                datasets: [{
                    label: 'Top 10',
                    data: top10Prices,
                    fill: true,
                    backgroundColor: top10Colors,
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: Math.max.apply(Math, top10Prices) * 1.15,
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