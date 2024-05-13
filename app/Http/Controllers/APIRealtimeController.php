<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class APIRealtimeController extends Controller
{
    private $usersSession;

    public function __invoke(Request $request, $target)
    {
        $session = AnyController::getSession();
        if(isset($session['users'])){
            $this->usersSession = $session['users'];
        }

        if (method_exists($this, $target)) {
            return $this->$target($request);
        } else {
            return response()->json($this->messages['API']['method_not_found'], 404);
        }
    }

    private function home(Request $request)
    {
        if ($request->missing('category')) {
            return response('terjadi kesalahan pada client');
        }

        $category = $request->get('category');

        $data = $this->models['type']::select(['name', 'image'])
            ->selectSub(function ($q) {
                $q->from('items')
                    ->selectRaw('COUNT(*)')
                    ->whereRaw('items.type_id = type.id AND status = 1');
            }, 'items_count')
            ->whereHas('category', function ($q) use ($category) {
                $q->where('name', 'like', "%$category%");
            })
            ->get();

        return response()->json($data);
    }

    private function data(Request $request)
    {
        if (!app()->call('App\Http\Controllers\ValidationController@admin')) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        $input = $request->get('name');

        $data = $this->models['history']::with(['murid.jurusan', 'murid.kelas', 'items'])
            ->where('status', 0)
            ->whereHas('murid', function ($q) use ($input) {
                $q->where('name', 'like', "%$input%");
            })
            ->get();

        return response()->json($data);
    }

    private function history(Request $request)
    {
        if (!app()->call('App\Http\Controllers\ValidationController@admin')) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        $input = $request->all();

        $data = $this->models['history']::with(['murid', 'items'])
            ->where([
                ['date_start', 'like', '%' . $input['date_start'] . '%'],
                ['status', 'like', '%' . $input['status'] . '%']
            ])
            ->whereHas('items.type.category', function ($q) use ($input) {
                $q->where('id', 'like', '%' . $input['category_id'] . '%');
            })
            ->get();

        return response()->json($data);
    }

    private function details(Request $request)
    {
        if (!app()->call('App\Http\Controllers\ValidationController@admin')) {
            return response()->json($this->messages['auth']['not_admin']);
        }

        $input = $request->get('type');

        try {
            $data = $this->models['items']::with(['murid.kelas', 'murid.jurusan'])
                ->whereHas('type', function ($q) use ($input) {
                    $q->where('name', $input);
                })
                ->get();
        } catch (Exception $e) {
            return response()->json($this->messages['items']['invalid']);
        }

        if (count($data) === 0) {
            return response()->json($this->messages['items']['invalid_type']);
        }

        return $data;
    }
}
