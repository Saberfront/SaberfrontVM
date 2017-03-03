<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\Discord\Discord;
// ...

class UserDiscordSettingsController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->input('discord_user');
        $channel = app(Discord::class)->getPrivateChannel($user);

        Auth::user()->update([
            'discord_user' => $user,
            'discord_channel' => $channel,
        ]);
    }
}

