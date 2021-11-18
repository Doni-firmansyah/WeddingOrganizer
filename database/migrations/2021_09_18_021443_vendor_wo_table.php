<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VendorWoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vendor_wo', function (Blueprint $table) {
            $table->foreignId('vendor_id')->constrained('vendors')->onUpdate('cascade')->nullable();
            $table->foreignId('wo_id')->constrained('wos')->onUpdate('cascade');
            // $table->primary(['vendor_id','wo_id']);
            // $table->integer('harga');
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
        //
    }
}
