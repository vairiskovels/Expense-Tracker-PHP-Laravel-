@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="category" class="main-body">
    @extends('layouts.navbar')
    <main id="category-page" class="main">
        <section id="chart-section">
            <h2 class="section-header">How much did you spend on <span id="month"></span> by months</h2>
            <div class="canvas category-bar">
                <canvas id="myChart" height="400px"></canvas>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        var categoryData = {!! json_encode($category) !!};
        const months = ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'];
        var data = [0,0,0,0,0,0,0,0,0,0,0,0];
        var color = null;
        var categoryName = null;
        categoryData.forEach(e => {
            color = (e['color']);
            categoryName = e['name'];
            data[e['month']-1] = parseFloat(e['price']);
        });
        document.getElementById("month").innerHTML = categoryName.toLowerCase();
        document.getElementById("month").style.color = color;

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: categoryName,
                    data: data,
                    fill: true,
                    backgroundColor: color.concat('80'),
                    borderColor: color,
                    tension: 0.2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        suggestedMin: 0,
                        suggestedMax: Math.max.apply(Math, data) * 1.1
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