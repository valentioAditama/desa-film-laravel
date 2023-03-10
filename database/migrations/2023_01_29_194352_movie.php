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
        Schema::create('movie', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('id_category')->nullable();
            $table->text('description');
            $table->string('link_film');
            $table->string('banner')->nullable();
            $table->string('poster')->nullable();
            $table->string('link_trailer');
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
        Schema::dropIfExists('movie');
    }
};
