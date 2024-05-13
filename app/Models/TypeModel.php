<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    use HasFactory;

    protected $table = 'type';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'last_index', 'category_id'];

    public function category() {
        return $this->belongsTo(CategoryModel::class);
    }

    public function items() {
        return $this->hasMany(ItemsModel::class);
    }
}
