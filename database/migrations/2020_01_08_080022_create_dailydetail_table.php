<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailydetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailydetail', function (Blueprint $table) {
            $table->bigIncrements('daily_id');
            $table->bigInteger('const_id');
            $table->date('daily_date');
            $table->integer('disp_order');
            $table->integer('subject_id');
            $table->string('subject',10);
            $table->string('item_name',64);
            $table->integer('paymethod_id')->default(1);
            $table->string( 'paymethod_text')->default('現金');
            $table->integer('person_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('qty');
            $table->integer('unit_id');
            $table->string('unit_text');
            $table->bigInteger('supplier_id');
            $table->string('supplier_text');
            $table->bigInteger('unit_price');
            $table->bigInteger('sub_total');
            $table->bigInteger('tax');
            $table->bigInteger('total_price');
            $table->bigInteger('user_id');
            $table->SoftDeletes();
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
        Schema::dropIfExists('dailydetail');
    }
}
