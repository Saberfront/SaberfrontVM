@extends('layouts.app')

@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard 
        <small> - Saberfront Secondary Stats Server</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventories</span>
              <span class="info-box-number">{{ count($inventories)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        @if (Auth::user()->active )
        
        @endif
    </div>
    <div class="box">
    <div class="box-header">
        <h3 class="box-title"> All Secondary Inventories</h3>
    </div>
    <div class="box-body">
    <table id="inventoryTable" class='table table-bordered table-responsive table-striped no-padding'>
    <thead>
    <tr>
    <th>ROBLOX User ID</th>
    <th>Laser Ammo</th>
    <th>Particle Ammo</th>
    <th>Heat Missiles</th>
    <th>Smoke Missiles</th>
    </tr>
    </thead>
    <tbody>
    	@foreach ($inventories as $inventory)
              <tr>
              	<td>{{ $inventory->userId }}</td>
              	<td>{{ json_decode($inventory->tank_ammo)->laser }}</td>
              	<td>{{ json_decode($inventory->tank_ammo)->particle }}</td>
              	<td>{{ json_decode($inventory->tank_ammo)->heat_missile }}</td>
              	<td>{{ json_decode($inventory->tank_ammo)->smoke_missile }}</td>
              </tr>
    	@endforeach
    </tbody>
    </table>
    </div>
    </div>
    </section>
</div>
<script>
$(function(){
   $("#inventoryTable").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
   });
});
</script>
@endsection