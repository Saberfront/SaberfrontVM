@extends('layouts.app')

@section('content')
@if(!Auth::guest())
 <div class="content-wrapper">
 <section class="content-header"> <h1>
  Confirm Deletion of Loadout "{{Auth::user()->loadouts()->findOrFail($id)->loadout_name}}"
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ config('app.name', 'Saberfront DB2') }}</a></li>
        <li>Dashboard</li>
        <li>Users</li>
        <li>{{Auth::user()->name}}</li>
        <li>Loadouts</li>
        <li>{{Auth::user()->loadouts()->find($id)->loadout_name}}</li>
        <li class="active">Delete</li>
      </ol></section>
 <section class='content'>

 	<div class="deleteLoadout modal modal-danger">
 	<div class="modal-dialog" role="document">
 	<div class="modal-content">
 	 <div class="modal-header">
 	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
 	 <h3 class="modal-title">Confirm Deletion</h3>   

 	</div>
 	<div class="modal-body">
 	If you delete this loadout, you will have to select another one as your current loadout in game.
 	</div>
 	<div class="modal-footer">
            {{ Form::open(['method' => 'DELETE', 'route' => ['loadouts.destroy', $id]]) }}
  
   <button type="submit" class="btn btn-danger">Yes, Delete the Loadout</button>
    	   {{Form::close()}}

 	</div>
 	</div>
 	</div>

 </section>
 </div>

@endif
@endsection