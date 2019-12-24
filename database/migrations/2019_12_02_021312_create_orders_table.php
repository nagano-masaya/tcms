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
            $table->bigInteger('order_to_id')->nullable();
            $table->string('order_to')->nullable();
            $table->bigInteger('total_price');
            $table->integer('tax_rate');
            $table->bigInteger('tax');
            $table->bigInteger('order_price');
            $table->bigInteger('order_user_id');
            $table->string('order_user_name');
            $table->json('term')->nullable();
            $table->timestamp('recept_date')->nullable();
            $table->timestamp('recepted_date')->nullable();
            $table->bigInteger('recepted_user_id')->nullable();
            $table->string('recepted_user_name',32)->nullable();
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
