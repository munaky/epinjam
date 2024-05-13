<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}