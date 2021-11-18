<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogativitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logativitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->char('nama_route')->nullable();
            $table->char('keterangan')->nullable();
            $table->char('detail')->nullable();
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
        Schema::dropIfExists('logativitas');
    }
}
