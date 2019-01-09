<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update222001032019 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('alias',100);
            $table->string('meta_description',100)->nullable();
            $table->string('description',300);
            $table->string('content',5000);
            $table->string('image',200)->nullable();
            $table->string('tags',500)->nullable();
            $table->integer('views')->nullable();
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
