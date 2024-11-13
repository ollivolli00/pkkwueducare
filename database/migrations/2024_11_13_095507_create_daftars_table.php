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
        // Buat tabel daftars
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('pengguna') // Tabel `pengguna` sebagai referensi
                ->onDelete('cascade');
            $table->foreignId('beasiswa_id')
                ->constrained('beasiswa') // Tabel `beasiswa` sebagai referensi
                ->onDelete('cascade');
            $table->json('file_upload')->nullable(); // Ubah kolom menjadi JSON
            $table->string('namalengkap')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('daftars');
    }
};