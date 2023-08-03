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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 255);
            $table->string('nickname', 255)->nullable();
            $table->string('date_of_birth', 11);
            $table->string('phone', 10);
            $table->string('address', 500);
            $table->string('date_start_work', 6);
            $table->string('date_end_work', 6)->nullable();
            $table->string('salary', 10);
            $table->string('avatar', 500)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
