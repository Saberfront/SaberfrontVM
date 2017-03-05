@extends('layouts.app')

@section('content')
@php
use Saberfront\User;
use Saberfront\CustomLoadout;
use Carbon\Carbon;
function getTimeFromActTypeArrayStyle($actType,$act){
  switch($actType){
    case "loadout":
      return CustomLoadout::find((int)substr($act["object"],strpos($act["object"],":")+1))->created_at;
      break;
  }
}
@endphp
<div class="content-wrapper" style="min-height: 1126px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$user->name}}'s Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ config('app.name') }}</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">{{ $user->name }} 's profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-warning">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ ($user->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.$user->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $user->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">TBD</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">{{ $user->followers()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">{{ $user->following()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">0</a>
                </li>
              </ul>
<form action ="{{ secure_url('/follow') }}" method="POST">
<input type="hidden" name="user" value="{{ Auth::user()->id}}">
<input type="hidden" name="follow_id" value="{{$user->id}}">                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <button type="submit" href="" class="btn btn-primary btn-block"><b>Follow</b></button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="ion ion-speakerphone margin-r-5"></i> Legions</strong>

              <p>
                @foreach ($user->teams as $team)
                @if($user->isOwnerOfTeam($team)) 
                <span class="label label-success">{{$team->name}}</span>
                @else
                <span class="label label-primary">{{$team->name}}</span>
                @endif
                @endforeach
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i>Blurb</strong>

              <p>{!! $user->blurb !!}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">{{ $user->name }}'s Loadouts</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                     @foreach ($activities as $activity)
                                         @if ($activity["type"] == "loadout")

                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ (User::find(substr($activity['actor'],-1))->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.User::find(substr($activity['actor'],-1))->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( User::find(substr($activity['actor'],-1))->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="user image">
                        <span class="username">
                          <a href="#">@php  echo User::find(substr($activity["actor"],-1))->name; @endphp</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{$activity["verb"]}} {{$activity["display_name"]}}  - {{Carbon::parse(getTimeFromActTypeArrayStyle($activity["type"],$activity))->timezone("America/New_York")->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Consists of a {{CustomLoadout::find(substr($activity["object"],strpos($activity["object"],':')+1))->weapon_name}} and a {{CustomLoadout::find(substr($activity["object"],strpos($activity["object"],':')+1))->secondary_name}}. 
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        @php
                          $commentable_class = substr($activity["object"],0,strpos($activity["object"],':'));
                          $commentable_id = substr($activity["object"],strpos($activity["object"],':')+1)
                        @endphp
                        ({!! count($commentable_class::find($commentable_id)->comments) !!})</a></li>
                     
                  </ul>
@if ($activity["type"] == "loadout")
<form action="{{ secure_url('/loadouts/' . substr($activity['object'],strpos($activity['object'],':')+1).'/comment')}}" method="post"><div class="input-group">

                  <input class="form-control"  type="text" name="commentBody" placeholder="Type a comment" >
                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                  <span class="input-group-btn">
        <button type="submit" class="btn btn-primary" id="post-btn">
      </span>Post</button>
                    </div>

                  </form>
                  @endif
                </div>
                <!-- /.post -->

                <!-- Post -->
                   @endif
                @endforeach
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          {{ date("j M Y")  }}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                                    @foreach($user->loadouts as $loadout)

                  <li>
                    <i class="fa fa-camera bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>{{$loadout->created_at->diffForHumans()}}</span>

                      <h3 class="timeline-header"><a href="{{ secure_url('/users/' . $user->id) }}">{{$user->name}}</a> created the Loadout "{{$loadout->loadout_name}}"</h3>

                      <div class="timeline-body">
                        This loadout contains of the {{ $loadout->weapon_name}} and the {{$loadout->secondary_name}} blasters. 
                        This loadout {{ ($loadout->public) ? 'is ' : 'is not '}} public.
                      </div>
                      <div class="timeline-footer">
                      @if (!Auth::guest())
                      <form name="like_action" id="like" action="{{ secure_url('/loadouts/like') }}" method="post">
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <input type="hidden" name="id" value="{{ $loadout->id }}">

                      <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                      <button type="submit" onclick="event.preventDefault(); $('#like').submit();" class="btn btn-primary btn-xs"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like ({{$loadout->likeCount}})</button>
                      
                        <a class="btn btn-primary btn-xs">Use</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </form>
                      @endif
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
               
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                 
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                
                  </li>
                  <!-- END timeline item -->
                  <li>
                  @endforeach
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              @if (Auth::user()->id == $user->id)
               <form class="form-horizontal" method="POST" action="{{ secure_url('users/' . $user->id . '/changeSettings/discord')}}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                  <div class="form-group has-feedback">
                    <label for="discordUserId" class="col-sm-2 control-label">My Discord ID</label>
                  
                    <div class="col-sm-10">
                       <input type="number" name="discordUserId" class="form-control" placeholder="0000"><span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span> 
                       <button type="submit" class="btn btn-primary">Save Discord Settings</button>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="discordUserId" class="col-sm-2 control-label">Desired Discord Channel (ID)</label>
                  
                    <div class="col-sm-10">
                       <input type="number" name="discordChannelId" class="form-control" placeholder="0000"><span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span> 
                       <button type="submit" class="btn btn-primary">Save Discord Settings</button>
                    </div>
                  </div>
                  
                </form>
                <form class="form-horizontal" method="POST" action="{{ secure_url('users/' . $user->id . '/changeSettings/blurb')}}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                  <div class="form-group">
                    <label for="inputBlurb" class="col-sm-2 control-label">My Blurb</label>

                    <div class="col-sm-10">
                      <textarea name="blurb" id="inputBlurb" placeholder="Your blurb here"></textarea>
                    </div>
                  </div>
                  
                  
                </form>
                @else
                <p> Not authorized to change settings</p>
                @endif
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>
    <!-- /.content -->
  </div>
  @endsection