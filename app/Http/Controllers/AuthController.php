<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $input = $req->all();

        $login = $req->has('code') ? self::loginTempUsers($input) : self::loginAdmin($input);

        return $login === null ? redirect('/') : $login;
    }

    private function loginAdmin($input)
    {
        $token = Str::random(224) . time();

        $users = $this->models['users']::with('role')
            ->where([
                ['username', $input['username']],
                ['password', $input['password']]
            ])
            ->first();

        if ($users === null) {
            return redirect('/admin')->with('errors', $this->messages['auth']['auth_failed']);
        }

        $users->token = $token;
        $users->save();

        session()->put(
            'users',
            [
                'id' => null,
                'name' => $users->name,
                'username' => $users->username,
                'password' => $users->password,
                'token' => $token,
                'role' => $users->role->access
            ]
        );
    }

    private function loginTempUsers($input)
    {
        $code = $input['code'];

        $users = $this->models['temp_users']::with(['role', 'murid'])
            ->where([
                ['code', $code],
                ['status', 1]
            ])
            ->first();

        if ($users === null) {
            return redirect('/murid')->with('errors', $this->messages['auth']['auth_failed']);
        }

        $users->update(['status' => '0']);

        session()->put(
            'users',
            [
                'id' => $users->id,
                'murid_id' => $users->murid->id,
                'name' => $users->murid->name,
                'code' => $users->code,
                'token' => $users->token,
                'role' => $users->role->access
            ]
        );
    }

    public function clearTempUsers()
    {
        $usersSession = AnyController::getSession()['users'];

        $tempCart = $this->models['temp_cart']::where('temp_users_id', $usersSession['id'])
            ->delete();
        $tempUsers = $this->models['temp_users']::where('id', $usersSession['id'])
            ->delete();

        if ($tempCart === 0 || $tempUsers === 0) {
            return $this->messages['cart']['something_wrong'];
        }

        return $this->messages['cart']['checkout'];
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')
            ->withCookie(cookie()->forget('id'))
            ->withCookie(cookie()->forget('token'));
    }
}
