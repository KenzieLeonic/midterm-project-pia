@extends('layouts.main')
@section('content')
<canvas id="myChart" width="200" height="200"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script  src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
<script type="text/javascript">
    //Data From Php to JAVASCRIPT
    var labels = {{Js::from($labels)}};
    var types = {{Js::from($data)}};
    const data = {
        labels: labels,
        datasets: [{
            label: 'Type Count',
            backgroundColor: ['rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'],
            data: types,
            borderWidth: 1,
        }]
    };
    const config = {
        type: 'doughnut', // type of chart
        data: data,
        options:{}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),config
    );
</script>
@endsection
