<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

use App\Models\CategoryModel;
use App\Models\HistoryModel;
use App\Models\ItemsModel;
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\MuridModel;
use App\Models\RoleModel;
use App\Models\TempCartModel;
use App\Models\TempUsersModel;
use App\Models\TypeModel;
use App\Models\UsersModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $models;
    protected $validation;
    protected $messages;

    public function __construct()
    {
        $this->models = [
            'category' => CategoryModel::class,
            'history' => HistoryModel::class,
            'items' => ItemsModel::class,
            'jurusan' => JurusanModel::class,
            'kelas' => KelasModel::class,
            'murid' => MuridModel::class,
            'role' => RoleModel::class,
            'temp_cart' => TempCartModel::class,
            'temp_users' => TempUsersModel::class,
            'type' => TypeModel::class,
            'users' => UsersModel::class,
        ];
        $this->messages = require base_path('app/Http/Controllers/messages.php');
        $this->validation = require base_path('app/Http/Controllers/validation.php');
    }
}
