<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('NIP');
            $table->string('jabatan', 100);
            $table->string('tempat_tugas', 100);
            $table->string('unit_kerja', 100);
            $table->foreignId('data_id')->constrained('data'); // Tidak boleh delete data dari table data jika sudah ada disini
            $table->foreignId('golongan_id')->constrained('golongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
