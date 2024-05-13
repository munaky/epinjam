<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridModel extends Model
{
    use HasFactory;

    protected $table = 'murid';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'card_id', 'kelas_id', 'jurusan_id'];

    public function kelas() {
        return $this->belongsTo(KelasModel::class);
    }

    public function jurusan() {
        return $this->belongsTo(JurusanModel::class);
    }
}
