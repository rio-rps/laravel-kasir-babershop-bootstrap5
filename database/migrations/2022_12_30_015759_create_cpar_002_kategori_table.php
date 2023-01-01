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
        Schema::create('cpar_002_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nm_kategori');
            $table->enum('status_layanan', ['1', '2'])->comment('1 = untuk pelayanan tanpa mengurangi stok, 2 = untuk product mengurangi stok');
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
        Schema::dropIfExists('cpar_002_kategori');
    }
};
