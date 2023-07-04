<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $table = "pegawai";

    public function getRouteKeyName()
    {
        return 'NIP';
    }

    public function data(){
        return $this->belongsTo(Data::class);
    }

    public function golongan(){
        return $this->belongsTo(Golongan::class); // Pastikan relasinya tidak terbalik
    }
}
