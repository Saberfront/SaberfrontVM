<?php

namespace Saberfront\Http\Controllers;
use Saberfront\User;
use Saberfront\Notifications\NewLoadoutNotification;
use Saberfront\CustomLoadout;
use Illuminate\Support\Facades\Auth;
use Saberfront\Transformer\LoadoutTransformer;
 
use Saberfront\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;

class LoadoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       protected $response;
 
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    public function index()
    {
        //
    }
    public function comment($id,Request $request){
        $user = Auth::user();
        $loadout = CustomLoadout::find((int) $id);
        $user->comment($loadout,$request->commentBody,0);
        return redirect("/users/".$loadout->user->id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loadouts.create',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['public'])){
            $request["public"] = ($request->public == "on") ? true : false;
        }
        $user = Auth::user();
        $loadout = CustomLoadout::create([
              'rid' => $request->rid,
              'loadout_name' => $request->loadout_name,
              'weapon_name' => $request->weapon_name,
              'secondary_name' => $request->secondary_name,
              'public' => $request->public,
             ]);

        $user->notify(new NewLoadoutNotification($loadout));
        return $loadout;
    }
    public function apiIndex(){
 $loadouts = CustomLoadout::paginate(15);
return $this->response->withPaginator($loadouts, new LoadoutTransformer());
    }
    public function apiShow($id,$loadoutid){
        $user = User::find($id);
        $loadout = $user->loadouts()->find($loadoutid);
        if (!$loadout) {
            return $this->response->errorNotFound('Loadout Not Found');
        }
        return $this->response->withItem($loadout, new LoadoutTransformer());
    }
    public function apiShowWithRID($userid,$loadoutid){
        $user = User::where('robloxUserId',$userid);
        $loadout = $user->loadouts()->find($loadoutid);
        if (!$loadout) {
            return $this->response->errorNotFound('Loadout Not Found');
        }
        return $this->response->withItem($loadout, new LoadoutTransformer());
    }
    /**
     * Display the specified resource.
     *
     * @param  \Saberfront\CustomLoadout  $customLoadout
     * @return \Illuminate\Http\Response
     */
    public function show(CustomLoadout $customLoadout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Saberfront\CustomLoadout  $customLoadout
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomLoadout $customLoadout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Saberfront\CustomLoadout  $customLoadout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomLoadout $customLoadout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Saberfront\CustomLoadout  $customLoadout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->owns('loadout',CustomLoadout::find($id))){
        CustomLoadout::find($id)->delete();
    }
    return view('home');
    }
    public function like(Request $request){
            CustomLoadout::find($request->id)->like($request->userId);
    }

    public function delete($id){
        return view('loadouts.delete',['id'=> $id]);
    }
}
