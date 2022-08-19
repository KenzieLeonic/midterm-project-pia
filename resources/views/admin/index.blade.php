@extends('layouts.main')
@section('content')
    <div class="chartbox flex w-1/4" >
        <canvas id="myChart"></canvas>
        <canvas id="lineChart"></canvas>
        <canvas id="pieChart"></canvas>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        //Data From Php to JAVASCRIPT
        var type_labels = {!! json_encode($types_labels) !!};
        var type_dataset = {!! json_encode($types_dataset) !!};
        var tag_labels = {!! json_encode($tags_labels) !!};
        var tags_dataset = {!! json_encode($tags_dataset) !!};
        var processes_label = {!! json_encode($processes_labels) !!};
        var processes_dataset = {!! json_encode($processes_dataset) !!};


        //type set up
        const typeData = {
            labels: type_labels,
            datasets: [{
                label: 'Type Count',
                backgroundColor: ['rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: ['rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                data: type_dataset,
                borderWidth: 1,
            }]
        };

        //set up for tags data
        const tagData = {
            labels: tag_labels,
            datasets: [{
                label: 'Tag Count',
                backgroundColor: ['rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: ['rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                data: tags_dataset,
                borderWidth: 1,
            }]
        }

        //set up for tags data
        const processData = {
            labels: processes_label,
            datasets: [{
                label: 'Process Count',
                backgroundColor: ['rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: ['rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                data: processes_dataset,
                borderWidth: 1,
            }]
        }

        //config
        const config = {
            type: 'doughnut', // type of chart
            data: typeData,
            options: {}
        };
        //render barChart
        const config2 = {
            type: 'bar',
            data: tagData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        //reader for tagData (barChart)
        const config3 = {
            type: 'pie',
            data: processData,
            options: {},
        }

        //config init blog
        const myChart = new Chart(
            document.getElementById('myChart'), config
        );


        //config lineChart
        const lineChart = new Chart(
            document.getElementById('lineChart'),config2
        );

        //config pieChart
        const pirChart = new Chart(
            document.getElementById('pieChart'), config3
        )

    </script>
@endsection
