<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->String('menu_id',5);
            $table->String('menu_name')->nullable();
            $table->Integer('menu_stock')->nullable();
            $table->Integer('menu_unit')->unsigned()->nullable();
            $table->Integer('menu_type')->unsigned()->nullable();
            $table->double('menu_price')->nullable();
            $table->double('menu_discount')->nullable();
            $table->timestamps();

            $table->primary('menu_id');
            $table->foreign('menu_unit')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('menu_type')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
