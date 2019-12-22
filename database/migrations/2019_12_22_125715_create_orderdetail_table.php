<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->bigIncrements('odrdetail_id');
            $table->string('item_name');
            $table->bigInteger('unit_price');
            $table->bigInteger('qty');
            $table->bigInteger('total_price');
            $table->bigInteger('tax');
            $table->bigInteger('taxed_price');

            $table->bigInteger('order_id');
            $table->softDeletes();
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
        Schema::dropIfExists('orderdetail');
    }
}
/*
odrdetail_id
item_name
unit_price
qty
total_price
ax
taxed_price
order_id
*/
