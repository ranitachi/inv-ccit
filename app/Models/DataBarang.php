<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    use SoftDeletes;
    protected $table='data_barang';

    function kategori()
    {
        return $this->belongsTo('App\Models\KategoriBarang','kategori_id');
    }
}
