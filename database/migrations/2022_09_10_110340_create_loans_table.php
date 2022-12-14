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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->date('lended_at');
            $table->date('retrieved_at')->nullable();
            $table->bigInteger('asset_id')->unsigned();
            $table->bigInteger('lended_by')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('observations')->nullable();
            $table->timestamps();

            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('lended_by')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
