<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarsTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'daftars'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id(); // ID otomatis untuk setiap pendaftaran
            $table->unsignedBigInteger('user_id'); // ID pengguna yang mendaftar
            $table->unsignedBigInteger('beasiswa_id'); // ID beasiswa yang didaftar
            $table->string('namalengkap'); // Nama lengkap pengguna
            $table->date('tanggal_lahir'); // Tanggal lahir pengguna
            $table->enum('jenis_kelamin', ['L', 'P']); // Jenis kelamin
            $table->string('email'); // Email pengguna
            $table->string('no_telp'); // Nomor telepon pengguna
            $table->string('image')->nullable(); // Image profil pengguna
            $table->string('zip_file')->nullable(); // Kolom untuk menyimpan file ZIP
            $table->timestamps(); // Kolom untuk mencatat waktu pembuatan dan update
        });

        // Menambahkan foreign key untuk relasi dengan tabel 'users' dan 'beasiswas'
        Schema::table('daftars', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('beasiswa_id')->references('id')->on('beasiswas')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'daftars'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftars', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['beasiswa_id']);
        });

        Schema::dropIfExists('daftars');
    }
}
