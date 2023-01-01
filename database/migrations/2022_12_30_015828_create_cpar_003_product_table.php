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
        Schema::create('cpar_003_product', function (Blueprint $table) {
            $table->id();
            $table->string('nm_product');
            $table->foreignId('id_kategori')->constrained('cpar_002_kategori');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->enum('status_tersedia', ['1', '2'])->comment('1 = tampil / barang tersedia, 2 = tidak tersedia');
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
        Schema::dropIfExists('cpar_003_product');
    }
};
