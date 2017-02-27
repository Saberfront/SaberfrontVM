<?php
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Input;

use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::get('regimentAttributes', 'RegimentAttributesController@index');
Route::get('regimentAttributes/{id}', 'RegimentAttributesController@show');
Route::get('/inventories','SecondaryInventoryViewController@index');
Route::get('/inventory/{id}','SecondaryInventoryViewController@show');

Route::get('/developer/dash',"DeveloperDashController@index");
Route::get('/users/search', function (Request $request) {
	 // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $users = App\User::search($request->get('q'))->get();

            // If there are results return them, if none, return the error message.
                    return  view('users.search',['result' => $users->count() ? $users : $error]);
 			\FeedManager::followUser($request->user()->id, $request->follow_id);
        }

        // Return the error message if no keywords existed
        return  view('users.search',['result' => $error]);
    
});
Route::get('/users/{id}',function($id) {
	$user = App\User::findOrFail($id);
	return view('users.show',['user' => $user]);
});
 
    Route::get('/messages', 'MessagesController@index');
    Route::get('/messages/create','MessagesController@create');
    Route::post('/messages','MessagesController@store');
    Route::get('/messages/{id}','MessagesController@show');
    Route::put('/messages/{id}','MessagesController@update');

Route::get('/follow/{id}',function($id){
    $user1 = Auth::user();
    $user2 = User::findOrFail($id);
    $user1->following()->save($user2);
    return redirect('/users/' . $user1->id);
});
Route::get('unfollow/{id}',function($id){
 \FeedManager::unfollowUser(Auth::user()->id,User::findOrFail($id)->id);
 return redirect('/users/' . Auth::user()->id);
});
Route::get('/redirect', function (Request $request) {
    $query = http_build_query([
        'client_id' => $request->get('cid'),
        'grant_type' => $request->get('gtype'),
        'redirect_uri' => $request->get('r_uri'),
        'response_type' => $request->get('resp_type'),
        'scope' => $request->get('scope'),
    ]);
Route::group(array('prefix' => 'api/v1', 'middleware' => []), function () {
    // Custom route added to standard Resource
    // Standard Resource route
    Route::get('messages/create','MessagesController@create');
    Route::resource('messages', 'MessagesController');
});
    return redirect('http://'.$_SERVER["SERVER_NAME"].'/saberfrontdb2/oauth/authorize?'.$query);
});