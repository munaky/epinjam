<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AnyController extends Controller
{
    public static function getSession()
    {
        $sessionId = Cookie::get('laravel_session');

        session()->setId($sessionId);

        return session()->all();
    }

}
