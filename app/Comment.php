<?php

namespace Saberfront;
use Actuallymab\LaravelComment\Models\Comment as OrigComment;
use Illuminate\Database\Eloquent\Model;
use GetStream\StreamLaravel\Eloquent\ActivityTrait;
use Carbon\Carbon;
use DateTime;
use FeedManager;
class Comment extends OrigComment
{
	use ActivityTrait;
	    public function activityExtraData()
    {
        return array('content' => $this->comment,"type" => "comment","obj_type" => $this->commentable_type);
    }
    public function activityActorMethodName()
    {
        return 'commented';
    }
      public function activityVerb()
    {
        return 'Commented';
    }    
    public function activityTime()
    { 
        return Carbon::now("America/New_York")->toAtomString(DateTime::ISO8601);
     
    }

    public function activityNotify()
    {
        $targetFeed = FeedManager::getNotificationFeed($this->commented->id);
        return array($targetFeed);
    }
}
