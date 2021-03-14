<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->increments('id');
            $table->String('packet_name');
            $table->Integer('packet_status')->nullable();
            $table->timestamps();
        });

        Schema::create('packet_has_menus', function (Blueprint $table) {
            $table->Integer('packet_id')->unsigned();
            $table->String('menu_id',5)->nullable();
            $table->timestamps();

            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packets');
        Schema::dropIfExists('packet_has_menus');
    }
}
