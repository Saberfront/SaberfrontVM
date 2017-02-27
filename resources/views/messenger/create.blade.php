@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<section class='content'>
 
<div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick PM/DM</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove"  title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
 <div class="box-body">
<form action="{{ url('/messages') }}" action='PUT'>
<div class="col-md-6">
    <!-- Subject Form Input -->
    <div class="form-group">
        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
        {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
    </div>

    <!-- Message Form Input -->
    <div class="form-group">
        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
        {!! Form::textarea('message', null, ['class' => 'textarea form-control']) !!}
    </div>

    @if($users->count() > 0)
    <div class="checkbox">
        @foreach($users as $user)
            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}</label>
        @endforeach
    </div>
    @endif
     <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
</form>
</div>
</div>
</div>
</section>
</div>

@endsection
