<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Data;
use App\Models\Golongan;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Golongan::create([
            'golongan' => 'IV/c',
            'eselon' => 'I',
        ]);
        
        Golongan::create([
            'golongan' => 'III/a',
            'eselon' => 'I',
        ]);

        Data::create([
            'nama' => 'Andi Agung',
            'tempat_lahir' => 'kendari',
            'jk' => 'L',
        ]);

        Data::create([
            'nama' => 'Wijaya Adinugraha',
            'tempat_lahir' => 'Bandung',
            'jk' => 'L',
        ]);

        Data::create([
            'nama' => 'Anisa Selvi',
            'tempat_lahir' => 'Jakarta',
            'jk' => 'P',
        ]);

        Data::create([
            'nama' => 'Jeki Halim',
            'tempat_lahir' => 'Papua',
            'jk' => 'L',
        ]);

        Pegawai::create([
            'jabatan' => 'Kepala Unit' ,
            'unit_kerja' => 'Software Development' ,
            'tempat_tugas' => 'Jakarta' ,
            'data_id' => '1' ,
            'golongan_id' => '1' ,
        ]);

        Pegawai::create([
            'jabatan' => 'Staf' ,
            'unit_kerja' => 'Data Manager' ,
            'tempat_tugas' => 'Jakarta' ,
            'data_id' => '2' ,
            'golongan_id' => '1' ,
        ]);

        Pegawai::create([
            'jabatan' => 'Sekretaris' ,
            'unit_kerja' => 'Business Development' ,
            'tempat_tugas' => 'Jakarta' ,
            'data_id' => '3' ,
            'golongan_id' => '2' ,
        ]);

        Pegawai::create([
            'jabatan' => 'Bendahara' ,
            'unit_kerja' => 'Software Development' ,
            'tempat_tugas' => 'Bandung' ,
            'data_id' => '4' ,
            'golongan_id' => '2' ,
        ]);

    

    }
}
