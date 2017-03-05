<?php
 
namespace Saberfront\Transformer;
use Saberfront\Legion;
use Saberfront\User;
class LegionTransfromer {
 
    public function transform($team) {
        return [
            'id' => $team->id,
            'owner_name' => User::find($team->owner_id)->name,
            'name' => $team->name
            
        ];
    }
 
}
