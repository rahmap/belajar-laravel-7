<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    public function Produk(){
        return $this->hasMany('App\Produk');
    }
}
