@extends("layouts.app")

@section("content")
<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="{{ (Auth::user()->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.Auth::user()->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
              <h5 class="widget-user-desc">Secondary Tank Inventory</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">LASER Rounds<span class="pull-right badge bg-blue">{{ json_decode($inventory->tank_ammo)->laser }}</span></a></li>
                <li><a href="#">PARTICLE Rounds <span class="pull-right badge bg-aqua">{{ json_decode($inventory->tank_ammo)->particle }}</span></a></li>
                <li><a href="#">HEAT Missiles <span class="pull-right badge bg-green">{{ json_decode($inventory->tank_ammo)->heat_missile }}</span></a></li>
                <li><a href="#">SMOKE Missiles <span class="pull-right badge bg-red">{{ json_decode($inventory->tank_ammo)->smoke_missile }}</span></a></li>
              </ul>
            </div>
          </div>


@endsection