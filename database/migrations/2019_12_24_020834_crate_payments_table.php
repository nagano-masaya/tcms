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
          $table->bigIncrements('payment_id');                /* 支払ID  */
          $table->bigInteger('orderclaim_id');                /* 支払請求ID */
          $table->timestamp('pay_dispose_date')->nullable();
          $table->timestamp('pay_confirm_date')->nullable();
          $table->timestamp('payed_date')->nullable();
          $table->string(       'pay_method')->nullable();
          $table->bigInteger('pay_dispose_uid')->nullable();
          $table->string(       'pay_dispose_uname')->nullable();   /* 支払担当者名 */

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
