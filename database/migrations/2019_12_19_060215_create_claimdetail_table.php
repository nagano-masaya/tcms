<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claimdetail', function (Blueprint $table) {
            $table->bigIncrements('clmdetail_id');
            $table->integer('listorder');
            $table->bigInteger('claim_id');
            $table->bigInteger('cont_id');
            $table->string('cont_text');
            $table->string('title');
            $table->bigInteger('unit_price');
            $table->bigInteger('qty');
            $table->bigInteger('total_price');
            $table->bigInteger('tax')->default(0);
            $table->bigInteger('taxed_price')->default(0);
            $table->bigInteger('discount_price')->default(0);
            $table->bigInteger('offset_price')->default(0);
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('claim_id')->references('claims')->on('claimn_id');
            //$table->foreign('cont_id')->references('contructs')->on('cont_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claimdetail');
    }
}
