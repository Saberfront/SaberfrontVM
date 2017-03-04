<?php

namespace Saberfront\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NotificationChannels\Discord\Discord;
// ...

class UserDiscordSettingsController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->input('discordUserId');
        $channel = $request->input('discordChannelId');

        Auth::user()->update([
            'discord_user' => $user,
            'discord_channel' => $channel,
        ]);
    }
}

