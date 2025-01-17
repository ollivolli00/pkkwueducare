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
        Schema::table('daftars', function (Blueprint $table) {
            $table->string('status')->default('Diproses')->after('created_at');
        });
    }
    
    public function down()
    {
        Schema::table('daftars', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
