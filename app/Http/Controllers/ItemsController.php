<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Http\Controllers\AnyController;
use Exception;

class ItemsController extends Controller
{
    private $usersSession;
    private $msg;

    public function __invoke(Request $request, $target)
    {
        parent::__construct();
        $this->usersSession = AnyController::getSession()['users'];
        $this->msg = $this->messages['items'];

        if ($this->usersSession['role'] == 'murid' && !app()->call('App\Http\Controllers\ValidationController@murid')) {
            return response()->json($this->messages['auth']['not_murid']);
        } else if (!app()->call('App\Http\Controllers\ValidationController@admin')) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        if (method_exists($this, $target)) {
            return $this->$target($request);
        } else {
            return response()->json($this->messages['API']['method_not_found']);
        }
    }

    private function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, $this->validation['add']['rules'], $this->validation['add']['errors']);
        $imgName = Str::random(64) . time() . '.' . $request->image->extension();
        $config = [
            'name' => $input['name'],
            'increment' => $input['amount']
        ];

        if ($validator->fails()) {
            return response()->json([
                'alert' => $this->messages['custom'](['fail', array_values(json_decode($validator->errors(), true))[0]]),
            ]);
        }

        try {
            $type = $this->models['type']::insert([
                'name' => $input['name'],
                'base_code' => str_replace(' ', '-', $input['name'] . '-'),
                'image' => 'storage/images/' . $imgName,
                'last_index' => 0,
                'category_id' => $input['category_id']
            ]);
        } catch (Exception $e) {
            return response()->json(['alert' => $this->msg['invalid']]);
        }

        if ($type === 0) {
            return response()->json(['alert' => $this->msg['invalid']]);
        }

        $request->image->storeAs('public/images', $imgName);

        return response()->json([
            'config' => $config,
            'alert' => $this->msg['add_items']
        ]);
    }

    private function checkout(Request $request)
    {
        $cart = $this->models['temp_cart']::where('temp_users_id', $this->usersSession['id'])
            ->pluck('items_id');

        try {
            $items = $this->models['items']::whereIn('id', $cart)
                ->where([
                    ['murid_id', -1],
                    ['status', 1]
                ])
                ->update([
                    'murid_id' => $this->usersSession['murid_id'],
                    'status' => 0
                ]);
        } catch (Exception $e) {
            return response()->json([
                'alert' => $this->messages['cart']['checkout_fail']
            ]);
        }

        if ($items === 0) {
            return response()->json([
                'alert' => $this->messages['cart']['checkout_fail']
            ]);
        }

        self::addMultiHistory($cart);

        return response()->json([
            'status' => true,
            'alert' => app()->call('App\Http\Controllers\AuthController@clearTempUsers')
        ]);
    }

    private function addMultiHistory($itemsId)
    {
        $data = [];

        foreach ($itemsId as $x) {
            array_push($data, [
                'murid_id' => $this->usersSession['murid_id'],
                'items_id' => $x,
                'date_start' => date('d/m/Y - H:i:s')
            ]);
        }

        $this->models['history']::insert($data);
    }

    private function qrcode(Request $request)
    {
        $input = $request->all();

        $data = [];
        $type = $this->models['type']::where('name', $input['name'])
            ->first();

        for ($x = $type->last_index + 1; $x <= $type->last_index + $input['increment']; $x++) {
            $code = $type->base_code . $x;

            array_push($data, [
                'qrcode' => QrCode::size(250)->generate($code),
                'type_id' => $type->id,
                'item_code' => $code
            ]);
        }

        $items = array_map(function ($item) {
            unset($item['qrcode']);
            return $item;
        }, $data);

        try {
            $type->increment('last_index', $input['increment']);
            $this->models['items']::insert($items);
        } catch (Exception $e) {
            return response('Status Code: 500');
        }

        return view('export.pdf.index', ['data' => $data]);
    }

    private function delete(Request $request)
    {
        $input = $request->get('id');

        try {
            $this->models['items']::find($input)->delete();
        } catch (Exception $e) {
            $this->msg['invalid'];
        }

        return response()->json($this->msg['delete_success']);
    }
}
