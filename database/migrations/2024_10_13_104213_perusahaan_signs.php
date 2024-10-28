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
        Schema::create('perusahaansigns', function (Blueprint $table) {
            $table->id();
            $table->string('namadepan');
            $table->string('namabelakang');
            $table->string('emailperusahaan')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('type')->default(2);
            $table->string('namaperusahaan');
            $table->string('password');
            $table->string('role')->default('perusahaan');
            $table->rememberToken();
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
        Schema::dropIfExists('perusahaansigns');
    }
};
