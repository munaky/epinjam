<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}
