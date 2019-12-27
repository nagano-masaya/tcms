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
          $table->timestamp('pay_disposal_date')->nullable(); /* 処理日 */
          $table->timestamp('pay_comfirm_date')->nullable();  /* 承認日 */
          $table->timestamp('payed_date')->nullable();
          $table->string('pay_method')->nullable();
$table->bigInteger('pay_dsipose_uid')->nullable();
          $table->string('pay_dispaose_uname')->nullable();   /* 支払担当者名 */

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
