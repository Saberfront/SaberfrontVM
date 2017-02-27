@extends('layouts.app')

@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard
        <small> - Saberfront Secondary Stats Server: Regiments' Attributes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li class="active">Dashboard</li>
        <li class="active">Regiment Attributes System</li>
      </ol>
    </section>
<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <canvas id="{{ 'regiment'.$regiment[0]->userId}}"></canvas>
        </div>
    </div>
    </section>
    <script>
     $(function(){
      var ctx = document.getElementById("{!! 'regiment'.$regiment[0]->userId !!}").getContext("2d");
var attrChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Constitution", "Dexterity", "Strength", "Intelligence"],
        datasets: [{
            label: '# of Points Allocated',
            data: [{!! json_decode($regiment[0]->attribute_data)->Constitution !!}, {!! json_decode($regiment[0]->attribute_data)->Dexterity !!}, {!! json_decode($regiment[0]->attribute_data)->Strength !!}, {!! json_decode($regiment[0]->attribute_data)->Intelligence !!}, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
     responsive: true,
     title: {
display: true,
text: "Regiment "  + {!! $regiment[0]->userId !!} + " 's Attributes"
     },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
     })
    </script>
</div>
@endsection