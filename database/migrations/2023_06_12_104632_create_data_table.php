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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir')->nullable()->default('1999-08-01');
            $table->string('alamat', 100)->nullable()->default('Jl. Mahakam No.16, RT 001 RW 002, Kec. Mandonga');
            $table->string('jk', 1);
            $table->string('npwp')->nullable()->default('1992 001 9029 2');
            $table->string('no_hp')->nullable()->default('085200001111');
            $table->string('email')->nullable()->default('user@example.com');
            $table->string('image', 100)->nullable();
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
        Schema::dropIfExists('data');
    }
};
