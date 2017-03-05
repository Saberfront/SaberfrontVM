@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-danger box-solid">
                    <div class="box-header"><h3 class="box-title">Found a new Legion</h3></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{secure_url('/legions/teams')}}">
                            {!! csrf_field() !!}
<input type="hidden" name="message" value="You have been invited to join team {{$team->name}}.<br>
Click here to join: <a href={{route('teams.accept_invite', $invite->accept_token)}}>{{route('teams.accept_invite', $invite->accept_token)}}</a>
">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <label class="col-md-4 control-label">Name</label>
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save"></i>Save
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
