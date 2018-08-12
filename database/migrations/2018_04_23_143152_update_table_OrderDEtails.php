<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableOrderDEtails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('order_detail', function (Blueprint $table) {
            $table->string('product_charm',50)->nullable();
            $table->integer('product_charm_id')->nullable()->unsigned();
            $table->foreign('product_charm_id')->references('id')->on('charm');
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
