<?php

namespace App;
use Bouncer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Laravel\Scout\Searchable;
use \GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Laravel\Passport\HasApiTokens;
use Cmgmyr\Messenger\Traits\Messagable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Hootlex\Friendships\Traits\Friendable;

use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
class User extends Authenticatable
{
    use Notifiable;
    use CanResetPassword;
    use HasApiTokens;
    use Searchable;
    use ActivityTrait;
    use Messagable;
    use HasRolesAndAbilities;
    use Friendable;
    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active','robloxUserId','tankInventoryId'
    ];
    public function searchableAs()
    {
        return 'users_index';
    }
   
    public function followers()
{
    return $this->belongsToMany('App\User', 'followers', 'follow_id', 'user_id')->withTimestamps();
}
 public function toSearchableArray()
    {
        $array = [
          'name' => $this->name,
          'robloxUserId' => $this->robloxUserId,
          'followers' => $this->followers()->count()
        ];

        // Customize array...

        return $array;
    }
public function newMessages(){
    $threads = Thread::forUserWithNewMessages($this->id)->latest('updated_at')->get();
    $unreads = 0;
    foreach ($threads as $thread) {
       $unreads += $thread->userUnreadMessagesCount($this->id);
    }
    return $unreads;
}
public function newMessagesLiteral(){
    $threads = Thread::forUserWithNewMessages($this->id)->latest('updated_at')->get();
    $unreads = [];
    foreach ($threads as $thread) {
        foreach($thread->userUnreadMessages($this->id) as $msg){
            array_push($unreads, $msg) ;
        }
      
    }
    return $unreads;
}
public function isAdmin(){
    return Bouncer::is($this)->a('admin');
}
public function following()
{
    return $this->belongsToMany('App\User', 'followers', 'user_id', 'follow_id')->withTimestamps();
}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function verified()
{
    $this->verified = 1;
    $this->email_token = null;
    $this->save();
}
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}
}
