<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianDistribusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_distribusis', function (Blueprint $table) {
            $table->id();
            $table->string('volume');
            $table->foreignId('distribusi_obat_id')->constrained('distribusi_obats')->onDelete('RESTRICT');
            $table->foreignId('stok_dinkes_id')->constrained('stok_dinkes')->onDelete('RESTRICT');
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
        Schema::dropIfExists('rincian_distribusis');
    }
}
