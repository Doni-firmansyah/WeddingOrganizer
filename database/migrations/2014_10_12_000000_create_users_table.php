<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('name', 50);
            $table->char('role', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->char('handphone', 25)->nullable();
            $table->char('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // vendor
            $table->char('nama_vendor', 50)->nullable();
            $table->char('email_vendor', 50)->nullable();
            $table->char('instagram_vendor', 50)->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->char('telp_vendor', 15)->nullable();
            $table->char('gambar', 50)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
