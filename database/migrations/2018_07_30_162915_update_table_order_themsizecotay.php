<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableOrderThemsizecotay extends Migration
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
            $table->string('product_size_co_tay_name',6)->nullable();

            $table->integer('product_size_co_tay_id')->nullable()->unsigned();
            $table->foreign('product_size_co_tay_id')->references('id')->on('size_co_tay');
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
