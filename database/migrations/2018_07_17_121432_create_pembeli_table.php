<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->string('telp',12);
            $table->string('alamat',500);
            $table->string('prov');
            $table->string('kd_pos',5);
            $table->string('status');
            $table->string('note');
            $table->string('bukti');
            $table->string('formid');
            $table->integer('jml_brg', false, true)->length(3);
            $table->integer('total', false, true)->length(10);
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
        Schema::dropIfExists('pembeli');
    }
}
