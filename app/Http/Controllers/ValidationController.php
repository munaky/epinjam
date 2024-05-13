<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function admin()
    {
        $session = AnyController::getSession()['users'];

        if (!array_key_exists('username', $session) || !array_key_exists('password', $session)) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        $users = $this->models['users']::where([
            ['username', $session['username']],
            ['password', $session['password']]
        ])
            ->first();

        if ($users === null) {
            return false;
        }

        return true;
    }

    public function murid()
    {
        $session = AnyController::getSession()['users'];

        if (!array_key_exists('token', $session) || !array_key_exists('code', $session)) {
            return response()->json($this->messages['auth']['not_murid']);
        }

        $users = $this->models['temp_users']::where([
            ['token', $session['token']],
            ['code', $session['code']],
            ['id', $session['id']]
        ])
            ->first();

        if ($users === null) {
            return false;
        }

        return true;
    }
}
