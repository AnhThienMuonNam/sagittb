<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('color', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
        });
              Schema::table('kieuday', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
        });
         Schema::table('material', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
        });
          Schema::table('size', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
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
