<?php

namespace Saberfront\Http\Controllers\Auth;
use DB;
use Mail;
use Saberfront\User;
use Bouncer;
use Saberfront\SecondaryInventory;
use Saberfront\Mail\EmailVerification;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Saberfront\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'rid' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }


 /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['active'] = true;
        $client = new Client();

        $_SESSION["RID"] =  $data["rid"];
        echo $_SESSION["RID"];
       $si = SecondaryInventory::create([
            'userId' => $_SESSION["RID"],
            'tank_ammo' => json_encode([
                    'laser' => 20,
                    'particle' => 30,
                    'heat_missile' => 40,
                    'smoke_missile' => 50
                ])
        ]);
       echo($si->id);
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => $data['active'],
            'robloxUserId' => $_SESSION["RID"],
            'email_token' => str_random(10),
            'tankInventoryId' => $si->id,
        ]);
        
        return $user;
    }

    public function verify($token)
{
    // The verified method has been added to the user model and chained here
    // for better readability
    //User::where('email_token',$token)->firstOrFail()->verified();
    return redirect('login');
}
}
