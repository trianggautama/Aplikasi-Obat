<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokPuskesmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_puskesmas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_stok')->length(35);
            $table->string('tgl_masuk');
            $table->date('tgl_exp');
            $table->integer('volume')->length(9);
            $table->foreignId('obat_id')->constrained('obats')->onDelete('RESTRICT');
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
        Schema::dropIfExists('stok_puskesmas');
    }
}
