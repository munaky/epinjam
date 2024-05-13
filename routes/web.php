<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GetContentController;
use App\Http\Controllers\APIRealtimeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\APIRFIDController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\AnyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', [AnyController::class, 'test']);

Route::get('/test2', function(){
    return view('test2');
});

/* Main */
Route::get('/', function () {
    if (session()->missing('users')) {
        return view('minimal.home.index');
    }

    if (session('users')['role'] == 'murid') {
        return response(view('index', ['access' => session()->get('users')['role']]))
            ->withCookie(cookie('token', session('users')['token'], 60, null, null, null, false));
    }

    return response(view('index', ['access' => session()->get('users')['role']]))
        ->withCookie(cookie('token', session('users')['token'], 60, null, null, null, false));
});

/* Auth */
Route::get('/murid', function () {
    return view('auth.murid');
});

Route::get('/admin', function () {
    return view('auth.admin');
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

/* API */

#API Get Content
Route::post('/api/get/content/{content}', GetContentController::class);

#API Get Data
Route::post('/api/get/realtime/{target}', APIRealtimeController::class);

#API Items
Route::match(['get', 'post'], '/api/items/{method}', ItemsController::class);
/* Route::post('/api/items/{method}', ItemsController::class); */

#API RFID
Route::match(['get', 'post'], '/api/rfid/{method}', APIRFIDController::class);

#API Users Services
Route::post('/api/users/{method}', UsersController::class);

#API Scanner
Route::post('/api/scanner/{method}', ScannerController::class);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
Route::get('/api/cmd', function(Request $req){
    $UsersModel = App\Models\UsersModel::class;

    if($req->missing(['username', ['password']])){
        return response('fail');
    }

    $input = $req->all();

    $user = $UsersModel::where([
        ['username', $input['username']],
        ['password', $input['password']]
    ])
    ->first();

    if($user === null){
        return response('fail');
    }

    /* Command Here */
    Artisan::call($input['c']);

    return response('success');
});
