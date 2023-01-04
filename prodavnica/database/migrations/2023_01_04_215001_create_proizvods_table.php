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
        Schema::create('proizvods', function (Blueprint $table) {
            $table->id();
            $table->string('sifra')->unique();
            $table->string('naziv');
            $table->integer('prodajna_cena');
            $table->integer('kupovna_cena');
            $table->integer('stanje');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->foreignId('vrsta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proizvods');
    }
};
