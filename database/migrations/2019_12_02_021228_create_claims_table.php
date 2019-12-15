<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->bigIncrements('claim_id');
            $table->bigInteger('company_id');
            $table->bigInteger('user_id');
            $table->bigInteger('price');
            $table->timestamp('claim_date')->nullable();
            $table->timestamp('claim_make_date')->nullable();
            $table->timestamp('claim_sent_date')->nullable();
            $table->timestamp('pay_date')->nullable();
            $table->bigInteger('pay_price');
            $table->integer('tax_rate');
            $table->bigInteger('tax');
            $table->bigInteger('price_total');
            $table->bigInteger('taxed_price');
            $table->bigInteger('discount_price');
            $table->bigInteger('offset_price');
            $table->json('details');
            $table->json('history')->nullable()->defautl('[]');
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
        Schema::dropIfExists('claims');
    }
}
