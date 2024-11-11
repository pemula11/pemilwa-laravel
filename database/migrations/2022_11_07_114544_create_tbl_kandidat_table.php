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
        Schema::create('tbl_kandidat', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->required();
            $table->string('image', 100);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('motto')->nullable();
            $table->enum('organisasi', ['TIDAK ADA','HMJ', 'DEMA', 'SEMA'])->nullable()->default('TIDAK ADA');
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
        Schema::dropIfExists('tbl_kandidat');
    }
};
