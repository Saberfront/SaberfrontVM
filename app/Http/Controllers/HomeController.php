<?php

namespace App\Http\Controllers;
use App\RegimentAttributes;
use DB;
use App\User;
use App\SecondaryInventory;
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

        return view('home',['regiments' => DB::table("regiment_data")->get(),'users' =>  User::all()->count(),'inventories' => SecondaryInventory::all()]);
    }
}
