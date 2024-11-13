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
        Schema::table('penggunas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id'); // Ganti 'id' dengan kolom yang sesuai
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Mengaitkan dengan tabel users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penggunas', function (Blueprint $table) {
            //
        });
    }
};
