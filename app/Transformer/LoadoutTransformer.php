<?php
 
namespace Saberfront\Transformer;
use Saberfront\CustomLoadout;

class LoadoutTransformer {
 
    public function transform($loadout) {
        return [
            'id' => $loadout->id,
            'rid' => $loadout->rid,
            'primary' => $loadout->weapon_name,
            'secondary' => $loadout->secondary_name,
            'name' => $loadout->loadout_name
        ];
    }
 
}
