@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-danger box-solid">
                    <div class="box-header"><h3 class="box-title">Edit Legion {{$team->name}}</h3></div>
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="{{secure_url('/legions/edit/', $team)}}">
                            <input type="hidden" name="_method" value="PUT" />
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $team->name) }}">

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
