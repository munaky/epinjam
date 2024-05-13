<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsModel extends Model
{
    use HasFactory;

    protected $table = 'items';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['type_id', 'item_code', 'murid_id', 'status'];

    public function murid() {
        return $this->belongsTo(MuridModel::class);
    }

    public function kelas() {
        return $this->belongsTo(KelasModel::class);
    }

    public function jurusan() {
        return $this->belongsTo(JurusanModel::class);
    }

    public function type(){
        return $this->belongsTo(TypeModel::class);  
    }
}
