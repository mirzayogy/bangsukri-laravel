<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
