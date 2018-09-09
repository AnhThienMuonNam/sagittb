<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableSizeVong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('size_vong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('category');

            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->integer('display_order')->nullable();

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
