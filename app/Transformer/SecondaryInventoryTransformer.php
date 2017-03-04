<?php
 
namespace Saberfront\Transformer;
use Saberfront\SecondaryInventory;

class SecondaryInventoryTransformer {
 
    public function transform($inventory) {
        return [
            'id' => $inventory->id,
            'userId' => $inventory->userId,
            'ammo' => $inventory->tank_ammo
        ];
    }
 
}
