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
        Schema::create('cpar_003_barangjasa', function (Blueprint $table) {
            $table->id();
            $table->string('nm_brgjasa');
            $table->foreignId('id_kategori')->constrained('cpar_002_kategori');
            $table->foreignId('id_satuan')->constrained('cpar_001_satuan');
            $table->integer('stok');
            $table->integer('harga_murni');
            $table->integer('diskon');
            $table->integer('harga_real');
            $table->text('ket_brgjasa');
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
