<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableCityOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('order', function (Blueprint $table) {
          
            $table->integer('payment_method_id')->nullable()->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_method');
        });

        Schema::table('city', function (Blueprint $table) {
            $table->boolean('is_ship_cod')->default(false);
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
