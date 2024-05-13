<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempUsersModel extends Model
{
    use HasFactory;

    protected $table = 'temp_users';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'murid_id', 'role_id', 'token', 'last_active', 'status'];

    public function role() {
        return $this->belongsTo(RoleModel::class);
    }

    public function murid() {
        return $this->belongsTo(MuridModel::class);
    }

    public function temp_cart() {
        return $this->hasMany(MuridModel::class);
    }
}
