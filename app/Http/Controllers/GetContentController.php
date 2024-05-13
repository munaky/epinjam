<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetContentController extends Controller
{
    private $usersSession;

    public function __invoke(Request $request, $content)
    {
        $this->usersSession = AnyController::getSession()['users'];

        if (method_exists($this, $content)) {
            $data = $this->$content($request);
        } else {
            return response()->json($this->messages['API']['method_not_found']);
        }

        return view('content.' . $content . '.index', ['data' => $data]);
    }

    private function home(Request $request)
    {
        return $this->models['category']::all();
    }

    private function data(Request $request)
    {

    }

    private function history(Request $request)
    {
        return $this->models['category']::all();
    }

    private function details(Request $request)
    {
        return $this->models['type']::select('name')->get();
    }

    private function add(Request $request)
    {
        return $this->models['category']::all();
    }

    private function cart(Request $request)
    {
        $cart = $this->models['temp_cart']::where('temp_users_id', $this->usersSession['id'])
            ->pluck('items_id');

        $data = $this->models['type']::select(['name', 'image'])
            ->selectSub(function ($q) use ($cart) {
                $q->from('items')
                    ->selectRaw('COUNT(*)')
                    ->whereRaw('items.type_id = type.id')
                    ->whereIn('items.id', $cart);
            }, 'items_count')
            ->having('items_count', '>', 0)
            ->get();

        return $data;
    }

    private function scanner(Request $request)
    {
        $isAdmin = $this->models['users']::where('token', $request->get('token'))
            ->count();

        return $isAdmin == 1 ? ['access' => 'admin'] : ['access' => 'murid'];
    }
}
