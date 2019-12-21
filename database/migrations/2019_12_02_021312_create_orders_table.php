<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('order_id');
            $table->biginteger('cont_id');
            $table->bigInteger('user_id');
            $table->date('order_date');
            $table->text('item_name');
            $table->text('order_to');
            $table->bigInteger('unit_price');
            $table->bigInteger('qty');
            $table->integer('tax_rate');
            $table->bigInteger('tax');
            $table->bigInteger('order_price');
            $table->bigInteger('order_by');
            $table->timestamp('recept_date');
            $table->bigInteger('recept_by');
            $table->json('claims');
            $table->json('payments');
            $table->json('history');
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
        Schema::dropIfExists('orders');
    }
}
