<?php

use Illuminate\Database\Seeder;

class FailedJobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Failed_Jobs')->delete();
        
        
        
    }
}