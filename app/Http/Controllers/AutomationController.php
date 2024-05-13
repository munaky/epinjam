<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutomationController extends Controller
{
    public function __invoke()
    {
        $usersId = $this->models['temp_users']::where('last_active', '<', now()->subMinutes(5))
            ->value('id');

        optional($usersId, function ($userId) {
            $this->models['temp_cart']::where('temp_users_id', $userId)->delete();
            $this->models['temp_users']::where('id', $userId)->delete();
        });
    }
}
