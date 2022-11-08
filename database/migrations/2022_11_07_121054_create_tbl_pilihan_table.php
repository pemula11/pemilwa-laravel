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
        Schema::create('tbl_pilihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kandidat');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_kandidat')->references('id')->on('tbl_kandidat')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('tbl_pilihan');
    }
};