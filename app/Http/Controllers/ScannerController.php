<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    private $usersSession;
    private $msg;

    public function __invoke(Request $request, $method)
    {
        parent::__construct();
        $this->usersSession = AnyController::getSession()['users'];
        $this->msg = $this->messages['scanner'];
        $action = $request->get('action');

        if ($action != 'kembalikan' && !app()->call('App\Http\Controllers\ValidationController@murid')) {
            return response()->json($this->messages['auth']['not_murid']);
        } else if (!app()->call('App\Http\Controllers\ValidationController@admin')) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        if (method_exists($this, $method)) {
            return $this->$method($request);
        } else {
            return response()->json($this->messages['API']['method_not_found'], 404);
        }
    }

    private function get(Request $request)
    {
        $code = $request->get('code');
        $action = $request->get('action');
        $role = $this->usersSession['role'];
        $usersId = $this->usersSession['id'];

        $items = $this->models['items']::with('type')
            ->where([
                ['item_code', $code],
                ['status', $action == 'kembalikan' ? '0' : '1']
            ])
            ->first();

        if ($items === null) {
            return response()->json(['alert' => $this->msg['invalid']]);
        }

        $vItems = self::validateItems($items->id, $usersId);

        if ($vItems && $role == 'murid' && $action == 'pinjam') {
            return response()->json(['alert' => $this->msg['cart_add_fail']]);
        } else if (!$vItems && $role == 'murid' && $action == 'hapus') {
            return response()->json(['alert' => $this->msg['cart_delete_fail']]);
        }

        return response()->json([
            'id' => $items->id,
            'type' => $items->type->name,
            'img' => $items->type->image,
            'code' => $items->item_code,
            'action' => ucfirst($action),
            'alert' => $this->msg['scan_success']
        ]);
    }

    private function pinjam(Request $request)
    {
        $input = $request->get('id');

        try {
            $this->models['temp_cart']::create([
                'temp_users_id' => $this->usersSession['id'],
                'items_id' => $input
            ]);
        } catch (Exception $e) {
            return response()->json($this->msg['invalid']);
        }

        return response()->json($this->msg['cart_add']);
    }

    private function hapus(Request $request)
    {
        $input = $request->get('id');

        try {
            $this->models['temp_cart']::where([
                ['temp_users_id', $this->usersSession['id']],
                ['items_id', $input]
            ])
                ->delete();
        } catch (Exception $e) {
            return response()->json($this->msg['invalid']);
        }

        return response()->json($this->msg['cart_delete']);
    }

    private function kembalikan(Request $request)
    {
        $input = $request->all();

        $items = $this->models['items']::where([
            ['id', $input['id']],
            ['murid_id', $input['murid_id']],
            ['status', 0]
        ])
            ->update([
                'murid_id' => -1,
                'status' => 1
            ]);

        $history = $this->models['history']::where([
            ['items_id', $input['id']],
            ['murid_id', $input['murid_id']],
            ['status', 0]
        ])
            ->update([
                'date_end' => date('d/m/Y - H:i:s'),
                'status' => 1
            ]);

        if ($items === 0 || $history === 0) {
            return response()->json($this->msg['return_items_fail']);
        }

        return response()->json($this->msg['return_items']);
    }

    private function validateItems($items_id, $users_id)
    {
        return $this->models['temp_cart']::where([
            ['items_id', $items_id],
            ['temp_users_id', $users_id]

        ])
            ->exists();
    }
}
