<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyitems', function (Blueprint $table) {
            $table->bigInteger('company_id');
            $table->bigInteger('item_id');
            $table->bigInteger('person_id');
            $table->timestamps();
            //$table->unique('company_id','item_id','person_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companyitems');
    }
}
