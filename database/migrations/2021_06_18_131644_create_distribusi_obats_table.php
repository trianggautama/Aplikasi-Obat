<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusiObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusi_obats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_distribusi');
            $table->string('tgl_distribusi');
            $table->string('status_distribusi');
            $table->string('tgl_diterima')->nullable();
            $table->foreignId('puskesmas_id')->constrained('puskesmas')->onDelete('RESTRICT');
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
        Schema::dropIfExists('distribusi_obats');
    }
}
