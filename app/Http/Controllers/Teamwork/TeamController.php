<?php

namespace Saberfront\Http\Controllers\Teamwork;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teamwork.index')
            ->with('teams', auth()->user()->teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teamwork.create');
    }
    
    /**
     * Return a set of teams that the user is part of 
     * @param int id
     * @return string
     */
     public function apiShow($id){
         $user = User::find($id);
         
        if (!$user) {
            return $this->response->errorNotFound('User Not Found');
        }
        $teams  = $user->teams;
        // Return a single task
        return $this->response->paginate($teams, new  LegionTransfromer());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::create([
            'name' => $request->name,
            'owner_id' => $request->user()->getKey()
        ]);
        $request->user()->attachTeam($team);

        return redirect(secure_url(route('teamwork.members')));
    }

    /**
     * Switch to the given team.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function switchTeam($id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);
        try {
            auth()->user()->switchTeam($team);
        } catch ( UserNotInTeamException $e ) {
            abort(403);
        }

        return redirect(route('teams.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);

        if (!auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        return view('teamwork.edit')->withTeam($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        if (!auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        $team->delete();

        $userModel = config('teamwork.user_model');
        $userModel::where('current_team_id', $id)
                    ->update(['current_team_id' => null]);

        return redirect(secure_url('/legions'));
    }

}