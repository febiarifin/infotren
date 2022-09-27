<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesantrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesantrens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('pengasuh');
            $table->string('alamat');
            $table->integer('jarak');
            $table->string('kontak');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('website')->nullable();
            $table->string('pa_pi')->nullable();
            $table->string('lurah_pa')->nullable();
            $table->string('lurah_pi')->nullable();
            $table->integer('jumlah_santri_pa')->nullable();
            $table->integer('jumlah_santri_pi')->nullable();
            $table->string('image');
            $table->text('content');
            $table->text('maps_url');
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
        Schema::dropIfExists('pesantrens');
    }
}