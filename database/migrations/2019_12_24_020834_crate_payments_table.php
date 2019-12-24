<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CratePaymentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      //
      Schema::create('payments', function (Blueprint $table) {
          $table->bigIncrements('payment_id');
          $table->bigInteger('order_id');
          $table->timestamp('claim_date')->nullable();
          $table->timestamp('payed_date')->nullable();

          $table->bigInteger('claim_recept_user_id')->nullable();
          $table->string('claim_recept_user_name')->nullable();
          $table->bigInteger('recepted_user_id')->nullable();
          $table->string('recepted_user_name')->nullable();

          $table->json('memo')->nullable();
          $table->json('claims')->nullable();
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
      //
      Schema::dropIfExists('payments');
  }
}
