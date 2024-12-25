<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';
    protected $guarded = [];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
