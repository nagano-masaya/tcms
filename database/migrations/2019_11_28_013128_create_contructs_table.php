<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContructsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contructs', function (Blueprint $table) {
            $table->bigIncrements('cont_id');
            $table->string('name')->uniqe();
            $table->date('date_from');
            $table->date('date_to');
            $table->string('customer')->nullable();
            $table->bigInteger('cust_company_id');
            $table->string('cust_company');
            $table->string('cust_person')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('budget_remain');
            $table->integer('state');
            $table->bigInteger('exec_budget');
            $table->bigInteger('price_taxed');
            $table->bigInteger('claim_remain');
            $table->bigInteger('deposit_remain');
            $table->json('documents')->nullable();
            $table->json('comment')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('const_admin')->nullable();
            $table->bigInteger('update_by');
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
        Schema::dropIfExists('contructs');
    }
}
