<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableFengShui extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phong_thuy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menh',50);
            $table->string('tuong_sinh',100);
            $table->string('hoa_hop',100);
            $table->string('che_khac',100);
            $table->string('bi_khac',100);
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
