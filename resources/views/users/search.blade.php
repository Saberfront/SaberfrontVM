@extends('layouts.app')

@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard
        <small> - Saberfront Secondary Stats Server: User Search</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li>Dashboard</li>
        <li>Users</li>
        <li class="active">Search</li>
      </ol>
    </section>
<section class="content">
@foreach ($result as $record)
<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{ $record->name }}</h3>
              <h5 class="widget-user-desc">{{'Member'}}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ ($record->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.$record->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $record->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">0</h5>
                    <span class="description-text">LOADOUTS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{count($record->followers)}}</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">0</h5>
                    <span class="description-text">ACHIEVEMENTS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
        <a href="#"></a>
    @endforeach
</section>
</div>
@endsection