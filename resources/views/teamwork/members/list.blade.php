@extends('layouts.app')
@php
   use Saberfront\User;
@endphp

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-danger box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Squad Members of legion "{{$team->name}}"</h3>
                        <div class="box-tools">
                             <a href="{{secure_url('/legions')}}" class="btn btn-sm btn-default btn-box-tool pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                       
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($team->users AS $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @if(auth()->user()->isOwnerOfTeam($team))
                                            @if(auth()->user()->getKey() !== $user->getKey())
                                                <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="box box-danger box-solid">
                    <div class="box-header"><h3 class="box-title">Pending invitations</h3></div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($team->invites AS $invite)
                                <tr>
                                    <td>{{User::where('email',$invite->email)->get[0]->name}}</td>
                                    <td>
                                        
                                        <form action="{{secure_url('/legions/members/resend', $invite)}}" method="get">
                                                                       {!! csrf_field() !!}
                                            <input type="hidden" name="subject" value="Invited to {{$team->name}}">
                                            <input type="hidden" name="message" value="You have been invited to join the legion {{$team->name}}.<br>
Click here to join: <a href={{secure_url('/legions/accept', $invite->accept_token)}}>{{secure_url('/legions/accept', $invite->accept_token)}}</a>
"><input type="hidden" name="subject" value="Invite to Legion {{ $team->name }}">
<input type="hidden" name="recipients" value="{{ User::where('email',$invite->email)->get()[0]->id}}">
                                           <button type="submit" class="btn btn-sm btn-default"> <i class="fa fa-envelope-o"></i> Resend invite</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>


                <div class="box box-danger box-solid">
                    <div class="box-header"><h3 class="box-title">Invite to Legion "{{$team->name}}"</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="{{secure_url('/messages/craft')}}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>

"><input type="hidden" name="subject" value="Invite to Legion {{ $team->name }}">

                                <div class="col-md-6">
                                    <input type="name" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
.
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-envelope-o"></i>Invite to Team
                                    </button>
                                </div>
                            </div>
                        </form>
                     
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
