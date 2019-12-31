<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderclaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderclaims', function (Blueprint $table) {
            $table->bigIncrements('orderclaim_id');
            $table->bigInteger('order_id');
            $table->timestamp('orderclaim_recept_date')->nullable();
            $table->integer('orderclaim_recept_user_id')->nullable();
            $table->string('orderclaim_recept_user_name')->nullable();
            $table->bigInteger('oderclaim_discount_price')->nullable();
            $table->bigInteger('orderclaim_offset_price')->nullable();
            $table->bigInteger('orderclaim_claim_price')->nullable();
            $table->json('claim_files')->nullable();

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
        Schema::dropIfExists('orderclaims');
    }
}
