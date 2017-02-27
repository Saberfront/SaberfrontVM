<?php

namespace App\Http\Controllers;
use App\RegimentAttributes;
use DB;
use App\User;
use App\SecondaryInventory;
use Illuminate\Http\Request;

class DeveloperDashController extends Controller
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
        return view('developer.dashboard');
    }
}