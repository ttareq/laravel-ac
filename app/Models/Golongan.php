<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    
    public $guarded = ["id"];

    public $timestamps = false;
    
    protected $table = "golongan";

    public  function pegawai(){
        return $this->hasMany(Pegawai::class, 'golongan_id');
        // return $this->belongsTo(Pegawai::class, 'golongan_id'); // Salah
    }

}
