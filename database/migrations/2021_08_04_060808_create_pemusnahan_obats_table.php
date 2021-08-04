<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemusnahanObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemusnahan_obats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pemusnahan');
            $table->integer('status')->length(2)->default(0);
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
        Schema::dropIfExists('pemusnahan_obats');
    }
}
