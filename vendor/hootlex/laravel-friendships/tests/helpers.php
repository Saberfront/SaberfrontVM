<?php
/**
 * Create a user
 *
 * @param array $overrides
 * @param int   $amount
 *
 * @return \App\User
 */
function createUser($overrides = [], $amount = 1){
    return factory(\Saberfront\User::class, $amount)->create($overrides);
}
