<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructs', function (Blueprint $table) {
            $table->bigIncrements('const_id');
            $table->bigInteger('cont_id');
            $table->bigInteger('user_id');
            $table->integer('const_type');
            $table->text('title');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('state');
            $table->float('progress',8,2);
            $table->bigInteger('resource_cost');
            $table->bigInteger('person_cost');
            $table->json('histry'); // {[{update_time:'',comment:""}]};
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
        Schema::dropIfExists('constructs');
    }
}
