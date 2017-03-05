@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-danger box-solid">
                    <div class="box-header ">
                        <h3 class="box-title">Legions</h3>
                        <div class="box-tools">
                            <a class=" btn btn-box-tool btn-default btn-sm" href="{{secure_url('/legions/create')}}">
                            <i class="fa fa-plus"></i> Create Legion
                        </a>
                        </div>
                        
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>
                                            @if(auth()->user()->isOwnerOfTeam($team))
                                                <span class="label label-success">Founder/Leader</span>
                                            @else
                                                <span class="label label-primary">Legionnaires</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                                <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-default">
                                                    <i class="fa fa-sign-in"></i> Switch
                                                </a>
                                            @else
                                                <span class="label label-default">Current Leader</span>
                                            @endif

                                            <a href="{{secure_url('/legions/members', $team)}}" class="btn btn-sm btn-default">
                                                <i class="fa fa-users"></i> Legionnaires
                                            </a>

                                            @if(auth()->user()->isOwnerOfTeam($team))

                                                <a href="{{secure_url('/legions/edit', $team)}}" class="btn btn-sm btn-default">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>

                                                <form style="display: inline-block;" action="{{secure_url('/legions/destroy', $team)}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
