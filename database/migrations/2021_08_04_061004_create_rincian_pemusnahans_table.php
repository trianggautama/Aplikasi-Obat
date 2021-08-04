<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianPemusnahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pemusnahans', function (Blueprint $table) {
            $table->id();
            $table->string('volume');
            $table->foreignId('pemusnahan_obat_id')->constrained('pemusnahan_obats')->onDelete('RESTRICT');
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
        Schema::dropIfExists('rincian_pemusnahans');
    }
}
