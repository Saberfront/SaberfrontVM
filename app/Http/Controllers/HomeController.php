<?php

namespace Saberfront\Http\Controllers;
use Saberfront\RegimentAttributes;
use DB;
use Bouncer;
use Saberfront\User;
use Illuminate\Support\Facades\Auth;
use Saberfront\SecondaryInventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.status');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
if (Auth::user()->id == 1 && !Auth::user()->isAn("admin")){
                        Bouncer::assign('admin')->to(Auth::user());
}
        return view('home',['regiments' => DB::table("regiment_data")->get(),'users' =>  User::all()->count(),'inventories' => SecondaryInventory::all()]);
    }
}
