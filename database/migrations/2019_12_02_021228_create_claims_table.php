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
            $table->timestamp('paied_date')->nullable();
            $table->json('history');
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
