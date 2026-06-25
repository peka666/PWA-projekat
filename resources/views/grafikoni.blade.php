@extends("layout")
@section("title")
Grafikoni
@endsection
@section("content")
    <h1 class="mt-4">Grafikoni</h1>
    
    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var analiza = @json($mesec);
            
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                if (!analiza || analiza.length < 2) {
                    document.getElementById('chart_div').innerHTML = 'No data available';
                    return;
                }

                var data = google.visualization.arrayToDataTable(analiza);
                
                var options = {
                    title: 'Mesečni prihodi u zavisnosti od meseca',
                    width: '100%',
                    height: 500,
                    is3D: true,
                    pieSliceText: 'value',
                };
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
            window.addEventListener('resize', function() {
                drawChart();
            });
        });
    </script>
@endsection