<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table->string('nickname',20);
            $table->string('fullname',64);
            $table->integer('is_customer')->default(0);
            $table->integer('is_subcon')->default(0);   /* 発注先フラグ　0:発注不可　1:発注可 */
            $table->integer('is_own')->default(0);      /* 自社　0：他社 1:他社*/
            $table->integer('closing')->default(0);     /* 締め　0:随時　1:月締め（締め日は次のフィールドで指定 2:月末締め */
            $table->integer('closing_day')->nullable(); /* 締め日 */
            $table->integer('payment')->default(0);     /* 支払日　0：随時 1：毎月指定日（日にちは次のフィールドで指定）　2:月末*/
            $table->integer('payment_day')->nullable(); /* 支払日*/
            $table->string('zip',20)->nullable();
            $table->string('address')->nullable();
            $table->string('tel',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('company');
    }
}
