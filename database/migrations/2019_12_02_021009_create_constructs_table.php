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
            $table->integer('const_type_id');
            $table->text('const_type_name',16);
            $table->text('title');
            $table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->text('person_name')->nullable();
            $table->integer('state');
            $table->float('progress',8,2);
            $table->bigInteger('exec_budget')->nullable();
            $table->bigInteger('resource_cost')->nullable();
            $table->bigInteger('person_cost')->nullable();
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
