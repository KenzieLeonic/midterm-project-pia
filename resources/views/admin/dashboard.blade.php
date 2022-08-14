@extends('layouts.main')
@section('content')

    <canvas id="myChart" width="400" height="400"></canvas>
{{--    #import chart js--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

    </script>

    <script>
            const myChart = new Chart(
            document.getElementById('myChart'),
            config
            );
    </script>
@endsection
