<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('orders', function (Blueprint $table) {
            $table->String('order_id', 25);
            $table->String('order_date')->nullable();
            $table->String('order_time')->nullable();
            $table->String('order_board', 2)->nullable();
            $table->String('customer_name')->nullable();
            $table->String('order_status')->default('unpaid');
            $table->double('order_payment')->nullable();
            $table->timestamps();

            $table->primary('order_id');
            $table->foreign('order_board')->references('board_id')->on('boards')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('order_has_menus', function (Blueprint $table) {
            $table->String('menu_id', 5);
            $table->Integer('menu_quantity');
            $table->String('order_id', 25);
            $table->timestamps();

            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_has_menus');
    }
}
