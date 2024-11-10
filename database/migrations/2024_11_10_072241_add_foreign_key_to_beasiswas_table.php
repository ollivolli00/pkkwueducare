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
        // Menambahkan foreign key pada kolom perusahaan_id
        $table->foreign('perusahaan_id')
              ->references('id')          // Kolom yang menjadi referensi di tabel perusahaan
              ->on('perusahaansign')      // Nama tabel perusahaan
              ->onDelete('cascade');      // Aksi saat data dihapus
    });
}

public function down()
{
    Schema::table('beasiswas', function (Blueprint $table) {
        // Menghapus foreign key
        $table->dropForeign(['perusahaan_id']);
    });
}

};
