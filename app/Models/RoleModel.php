<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'access'];
}
