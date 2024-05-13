<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke(Request $request, $method)
    {
        if (method_exists($this, $method)) {
            return $this->$method($request);
        } else {
            return response()->json($this->messages['API']['method_not_found']);
        }
    }

    private function extend(Request $request)
    {
        $session = AnyController::getSession()['users'];

        return self::extendMurid($session);
    }

    private function validates(Request $request)
    {
        $input = $request->all();

        if (session()->missing('token')) {
            session()->put('token', $input['token']);
        }

        if ($input['token'] != session('token')) {
            return response('false');
        }

        $usersSession = AnyController::getSession()['users'];


        return response($usersSession['role'] == 'murid' ? self::validateMurid($input) : self::validateAdmin($input));
    }

    private function validateAdmin($input)
    {
        $isToken = $this->models['users']::where('token', $input['token'])
            ->count();

        return $isToken != 0 ? 'true' : 'false';
    }

    private function validateMurid($input)
    {
        $isToken = $this->models['temp_users']::where([
            ['token', $input['token']]
        ])
            ->count();

        return $isToken != 0 ? 'true' : 'false';
    }

    private function extendMurid($input)
    {
        $users = $this->models['temp_users']::where([
            ['id', $input['id']],
            ['token', $input['token']]
        ])
            ->update([
                'last_active' => date('H:i:s')
            ]);


        return $users ? 'true' : 'false';
    }
}
