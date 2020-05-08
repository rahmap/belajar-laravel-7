<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uniq_produk', 'nama_produk', 'keterangan_produk', 'kategori_id', 'harga_produk',
        'diskon_produk', 'stok_produk', 'berat_produk'
    ];


    public function Kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
