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
        Schema::table('beasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable(); // Jika perusahaan_id bisa kosong, gunakan nullable()
            
            // Menambahkan foreign key jika ada relasi ke tabel perusahaan (opsional)
            // $table->foreign('perusahaan_id')->references('id')->on('perusahaans');
        });
    }
    
    public function down()
    {
        Schema::table('beasiswas', function (Blueprint $table) {
            $table->dropColumn('perusahaan_id');
        });
    }
    
};
