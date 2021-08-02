<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('volume');
            $table->foreignId('pengeluaran_puskesmas_id')->constrained('pengeluaran_puskesmas')->onDelete('RESTRICT');
            $table->foreignId('stok_puskesmas_id')->constrained('stok_puskesmas')->onDelete('RESTRICT');
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
        Schema::dropIfExists('rincian_pengeluarans');
    }
}
