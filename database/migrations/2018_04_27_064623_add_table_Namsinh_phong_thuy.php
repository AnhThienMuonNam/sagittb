<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableNamsinhPhongThuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('nam_phong_thuy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nam');
            $table->integer('phong_thuy_id')->unsigned(); 
            $table->foreign('phong_thuy_id')->references('id')->on('phong_thuy');
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
        //
    }
}
