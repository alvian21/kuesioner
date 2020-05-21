<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id');
            $table->unsignedBigInteger('kuesioner_id');
            $table->foreign('kuesioner_id')->references('id')->on('kuesioners')->onDelete('cascade');
            $table->unsignedBigInteger('GuestBook_id');
            $table->foreign('GuestBook_id')->references('id')->on('guest_books')->onDelete('cascade');
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
        Schema::dropIfExists('results');
    }
}
