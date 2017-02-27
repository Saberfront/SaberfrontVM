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
              <span class="info-box-text">RACs</span>
              <span class="info-box-number">{{ count($regiments)}}</span>
                 
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
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
        <div class="col-lg-3 col-xs-6">
           <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$users}}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        @endif
    </div>
    </section>
</div>
@endsection
