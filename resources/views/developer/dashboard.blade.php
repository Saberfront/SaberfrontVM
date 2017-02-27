@extends('layouts.app')

@section('content')

@if((!Auth::guest()) && Auth::user()->active)
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard 
        <small> - Saberfront Secondary Stats Server</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li >Dashboard</li>
        <li class="active">Developer Dashboard</li>
      </ol>
    </section>

<section class="content">
<passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>
</section>
</div>
@endif
@endsection