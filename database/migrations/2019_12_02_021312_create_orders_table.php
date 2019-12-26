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
            $table->date('order_date');

            $table->bigInteger('order_to_id')->nullable();
            $table->string('order_to')->nullable();
            $table->bigInteger('total_price');
            $table->bigInteger('tax');
            $table->integer('tax_rate');
            $table->bigInteger('order_price');

            $table->biginteger('cont_id');
            $table->bigInteger('order_user_id');
            $table->string('order_user_name');
            $table->json('term')->nullable();
            $table->timestamp('recept_date')->nullable();
            $table->bigInteger('payment_due_date')->nullable();

            $table->timestamp( 'recept_due_date')->nullable();
            $table->string(    'recept_place',120)->nullable();
            $table->timestamp( 'recepted_date')->nullable();
            $table->bigInteger('recepted_user_id')->nullable();
            $table->string(    'recepted_user_name',32)->nullable();

            $table->timestamp( 'claim_recepted_date')->nullable();
            $table->bigInteger('claim_discount')->nullable();
            $table->bigInteger('claim_offset')->nullable();
            $table->bigInteger('claim_price')->nullable();
            $table->bigInteger('claim_recepted_user_id')->nullable();
            $table->string(    'claim_recepted_user_name',32)->nullable();

            $table->timestamp( 'payed_date')->nullable();
            $table->bigInteger('payed_user_id')->nullable();
            $table->string(    'payed_user_name',32)->nullable();

            $table->bigInteger('user_id');
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
