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
            $table->integer('is_customer');
            $table->integer('is_subcon');
            $table->integer('closing');
            $table->integer('closing_day');
            $table->integer('payment');
            $table->integer('payment_day');
            $table->string('zip',20)->nullable();
            $table->string('address')->nullable();
            $table->string('tel',20)->nullable();
            $table->string('fax',20)->nullable();
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
