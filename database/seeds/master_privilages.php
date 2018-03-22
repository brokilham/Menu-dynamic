<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class master_privilages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_privilages')->insert(
            
            [           
            'created_at' => Carbon::create('2018', '03', '17'),
            'updated_at' => Carbon::create('2018', '03', '17'),
            'name' => 'tes',
            'created_by' => 'ILHAM',
            'status' => 'active'            
            ]
            
        );
    }
}
