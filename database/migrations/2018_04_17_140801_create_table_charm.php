<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCharm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('charm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('display_order')->nullable(); 
            $table->boolean('is_active')->default(true);
            $table->decimal('price',9,0);
            $table->boolean('is_deleted')->default(false);
            $table->integer('category_id')->unsigned(); 
            $table->foreign('category_id')->references('id')->on('category');
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
