<?php

namespace Saberfront;
use Saberfront\User;
use DateTime;
use Laravel\Scout\Searchable;
use FeedManager;
use Carbon\Carbon;
use Conner\Likeable\LikeableTrait;
use \GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Actuallymab\LaravelComment\Commentable;

class CustomLoadout extends Model
{
	use Searchable;
	use LikeableTrait;
use ActivityTrait;
use Commentable;
	 protected $table = 'loadouts';
     protected $canBeRated = true;
     protected $mustBeApproved = false;
    protected $fillable = [
        'weapon_name', 'loadout_name', 'rid','public','secondary_name'
    ];
   
      
     public function searchableAs()
    {
        return 'loadouts_index';
    }
     public function user()
    {
        return $this->belongsTo('Saberfront\User','rid','robloxUserId');

    }
      public function activityActorMethodName()
    {
        return 'user';
    }
   public function routeNotificationForWebhook(){
     return "https://discordapp.com/api/webhooks/287328375062790156/0z95ER0R6s_DsDx6Xt6mxXaVWOEEaduf7cr8jgso-YUb7oMAxmlJk_4u90fZRoIxuIKQ";
   }
    public function activityExtraData()
    {
        return array('name'=> $this->loadout_name . '_' . $this->id, 'display_name' => $this->loadout_name,"type" => "loadout");
    }
    public function activityVerb()
    {
        return 'Created';
    }
    public function activityTime()
    { 
        return Carbon::now("America/New_York")->toAtomString(DateTime::ISO8601);
     
    }
    public function activityNotify()
    {
        $targetFeed = FeedManager::getNotificationFeed(User::where("robloxUserId",$this->rid)->get()->first()->id);
        return array($targetFeed);
    }
    public function owner(){
	return $this->belongsTo('Saberfront\User','rid','robloxUserId');
}
      public function toSearchableArray()
    {
    	if($this->public){
        $array = $this->toArray();
}else{
	$array = [];
}

        // Customize array...

        return $array;
    }
}
