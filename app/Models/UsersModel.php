<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'username', 'password', 'role_id'];

    public function role() {
        return $this->belongsTo(RoleModel::class);
    }
}
