<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Data extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'data';

    public function pegawai(){
        return $this->hasOne(Pegawai::class, 'data_id');
    }
}
