<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';

    protected $fillable = [
        'nama_barang',
        'harga_barang',
    ];
}
