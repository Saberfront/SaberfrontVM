<?php
 
namespace App\Transformer;
use App\SecondaryInventory;

class SecondaryInventoryTransformer {
 
    public function transform($inventory) {
        return [
            'id' => $inventory->id,
            'userId' => $inventory->userId,
            'ammo' => $inventory->tank_ammo
        ];
    }
 
}
