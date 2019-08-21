<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBarang;

class Laporan extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'barang_id', 'id')->withDefault();
    }
    public function subBarang()
    {
        $barang = SubBarang::where('laporan_id', $this->id)->get();
        return collect($barang);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }
}
