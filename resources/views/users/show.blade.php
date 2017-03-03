@extends('layouts.app')

@section('content')
@php
use App\User;
use App\CustomLoadout;
use Carbon\Carbon;
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
<form action ="{{ url('/follow') }}" method="POST">
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

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ (User::find(substr($activity['actor'],-1))->robloxUserId != null) ? 'https://www.roblox.com/headshot-thumbnail/image?userId='.User::find(substr($activity['actor'],-1))->robloxUserId.'&width=420&height=420&format=png' : 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( User::find(substr($activity['actor'],-1))->email ) ) ) . '?d=' . urlencode( 'mm' ) . '&s=' . 80 }}" alt="user image">
                        <span class="username">
                          <a href="#">@php  echo User::find(substr($activity["actor"],-1))->name; @endphp</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">{{$activity["verb"]}} {{$activity["display_name"]}}  - {{Carbon::parse($activity["time"])->timezone("America/New_York")->diffForHumans()}}</span>
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
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                
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

                      <h3 class="timeline-header"><a href="{{ url('/users/' . $user->id) }}">{{$user->name}}</a> created the Loadout "{{$loadout->loadout_name}}"</h3>

                      <div class="timeline-body">
                        This loadout contains of the {{ $loadout->weapon_name}} and the {{$loadout->secondary_name}} blasters. 
                        This loadout {{ ($loadout->public) ? 'is ' : 'is not '}} public.
                      </div>
                      <div class="timeline-footer">
                      @if (!Auth::guest())
                      <form name="like_action" id="like" action="{{ url('/loadouts/like') }}" method="post">
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
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
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