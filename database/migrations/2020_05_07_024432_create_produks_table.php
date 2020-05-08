<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('uniq_produk', 20)->unique();
            $table->string('nama_produk', 70);
            $table->text('keterangan_produk');
            $table->foreignId('kategori_id')
            ->nullable()
            ->constrained('kategoris')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->bigInteger('harga_produk');
            $table->bigInteger('diskon_produk');
            $table->tinyInteger('stok_produk');
            $table->smallInteger('berat_produk');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
