<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    use HasFactory;

    protected $table = 'history';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['items_id', 'date_start', 'date_end', 'status'];

    public function items() {
        return $this->belongsTo(ItemsModel::class);
    }

    public function type() {
        return $this->belongsTo(TypeModel::class);
    }

    public function category() {
        return $this->belongsTo(CategoryModel::class);
    }

    public function murid() {
        return $this->belongsTo(MuridModel::class);
    }

    public function kelas() {
        return $this->belongsTo(KelasModel::class);
    }

    public function jurusan() {
        return $this->belongsTo(JurusanModel::class);
    }
}
