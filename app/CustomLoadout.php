<?php

namespace App;
use App\User;
use Laravel\Scout\Searchable;
use FeedManager;
use Carbon\Carbon;
use Conner\Likeable\LikeableTrait;
use \GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Illuminate\Database\Eloquent\Model;

class CustomLoadout extends Model
{
	use Searchable;
	use LikeableTrait;
use ActivityTrait;
	 protected $table = 'loadouts';
    protected $fillable = [
        'weapon_name', 'loadout_name', 'rid','public','secondary_name'
    ];
   
      
     public function searchableAs()
    {
        return 'loadouts_index';
    }
     public function user()
    {
        return $this->belongsTo('App\User','rid','robloxUserId');

    }
      public function activityActorMethodName()
    {
        return 'user';
    }
   
    public function activityExtraData()
    {
        return array('name'=> $this->loadout_name . '_' . $this->id, 'display_name' => $this->loadout_name);
    }
    public function activityVerb()
    {
        return 'Created';
    }
    public function activityTime()
    {
       return Carbon::now()->timezone("America/New_York")->toAtomString();
     
    }
    public function activityNotify()
    {
        $targetFeed = FeedManager::getNotificationFeed($this->owner()->id);
        return array($targetFeed);
    }
    public function owner(){
	return $this->belongsTo('App\User','rid','robloxUserId')->get()[0];
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
