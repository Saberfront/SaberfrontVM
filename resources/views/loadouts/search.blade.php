@extends('layouts.app')

@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard
        <small> - Saberfront Secondary Stats Server: Loadout Search</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li>Dashboard</li>
        <li>Loadouts</li>
        <li class="active">Search</li>
      </ol>
    </section>
<section class="content">
@foreach ($result as $record)
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="{{ ($record->owner->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.$record->owner->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $record->owner->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="Creator">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $record->owner->name }}'s Loadout: </h3>
              <h5 class="widget-user-desc">{{ $record->loadout_name}}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Primary Weapon<span class="pull-right badge bg-blue">{{$record->weapon_name}}</span></a></li>
                <li><a href="#">Secondary Weapon<span class="pull-right badge bg-aqua">{{ $record->secondary_name }}</span></a></li>
                <li><a href="#">LIKES<span class="pull-right badge bg-green">{{ $record->likeCount }}</span></a></li>
                
              </ul>
            </div>
          </div>
    @endforeach
</section>
</div>
@endsection