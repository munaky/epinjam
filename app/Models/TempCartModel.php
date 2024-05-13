<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCartModel extends Model
{
    use HasFactory;

    protected $table = 'temp_cart';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['temp_users_id', 'items_id'];

    public function temp_users() {
        return $this->belongsTo(TempUsersModel::class);
    }

    public function items() {
        return $this->belongsTo(ItemsModel::class);
    }
}
