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
            $table->bigIncrements('oderclaim_id');
            $table->bigInteger('order_id');
            $table->timestamp('orderclaim_recept_date');
            $table->integer('orderclaim_recept_user_id');
            $table->string('orderclaim_recept_user_name');
            $table->bigInteger('oderclaim_discount_price');
            $table->bigInteger('orderclaim_offset_price');
            $table->bigInteger('orderclaim_claim_price');
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
        Schema::dropIfExists('oderclaims');
    }
}
