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
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('image1');
            $table->string('image2');
            $table->string('namabeasiswa');
            $table->string('namaperusahaan');
            $table->date('batasbeasiswa');
            $table->string('minipersyaratan');
            $table->string('miniisi');
            $table->string('persyaratan');
            $table->text('isipersyaratan');
            $table->string('image3');
            $table->string('judul_benefit');
            $table->string('isi_benefit');
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
        Schema::dropIfExists('beasiswas');
    }
};
