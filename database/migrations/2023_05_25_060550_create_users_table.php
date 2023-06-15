<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('id_division')->nullable();
            $table->string('name');
            $table->bigInteger('no_hp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('level',['admin','employee','pic'])->default('pic');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_division')->on('division')->references('id')->onDelete('cascade');
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
};
