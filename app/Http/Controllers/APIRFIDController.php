<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class APIRFIDController extends Controller
{
    public function __invoke(Request $request, $target)
    {
        if (method_exists($this, $target)) {
            return $this->$target($request);
        } else {
            return response()->json($this->messages['API']['method_not_found']);
        }
    }

    private function get(Request $request)
    {
        $cardId = $request->get('card_id');

        $users = $this->models['murid']::select(['id', 'name', 'card_id'])
            ->where('card_id', $cardId)
            ->first();

        if ($users === null) {
            return response($this->messages['rfid']['card_id_unregistered']);
        }

        $code = self::createTempUsers($users->id);

        return response()->json([$users->name, $code]);
    }

    private function createTempUsers($id)
    {
        $users = $this->models['temp_users']::updateOrCreate(
            [
                'murid_id' => $id
            ],
            [
                'code' => Str::random(4),
                'murid_id' => $id,
                'last_active' => date('H:i:s'),
                'token' => Str::random(32) . time(),
                'status' => 1
            ]
        );

        return $users->code;
    }
}
