@extends('layouts.main')
@section('content')
    <script>
        //Data From Php to JAVASCRIPT
        const labels = {!! json_encode($labels)!!};
        const types = {!! json_encode($data) !!};
    </script>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script  src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
    <script>
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
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
            type: 'polarArea'; // type of chart
            data:data,
            options:{
                animation:{
                    animateRotate
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),config
        );
    </script>
@endsection
