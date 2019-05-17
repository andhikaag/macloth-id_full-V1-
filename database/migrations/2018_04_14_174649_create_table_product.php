<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function($table){
            $table->integer('no', false, true);
            $table->string('id', 10)->primary();
            $table->string('name');
            $table->integer('harga', false, true)->length(10);
            $table->string('category');
            $table->string('keterangan',1000);
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('status',20);
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
        Schema::drop('product');
    }
}
