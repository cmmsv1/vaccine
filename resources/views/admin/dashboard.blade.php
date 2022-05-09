@extends('layouts.dashboard')
@section('content')
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Mũi 1', {{$count1}}],
          ['Mũi 2', {{$count2}}],
          ['Mũi 3', {{$count3}}],
          ['Mũi 4', {{$count4}}],
        ]);

        var options = {
          title: 'Biểu đồ thống kê đã tiêm theo mũi vaccine',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Tên vaccine', 'Số lượng'],
          ["Pfizer", {{$count5}}],
          ["Sinopharm", {{$count6}}],
          ["Moderna", {{$count7}}],
          ['AstraZeneca', {{$count8}}],

        ]);

        var options = {
          width: 500,
          legend: { position: 'none' },
          chart: {
            title: 'Biểu đồ thống kê đã tiêm theo loại vaccine',
          },
          bar: { groupWidth: "30%" },
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
<div class="container-fluid">
  <div class="py-4 px-4">
    <div class="row">
      <div class="table-responsive">
        <div id="piechart_3d1" style="height: 350px"  class="col-lg-6"></div>
        <div id="top_x_div"  style="height: 350px" class="col-lg-6" ></div>
      </div>
    </div>
    
  </div>
</div>
{{--  --}}
@endsection