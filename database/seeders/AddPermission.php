<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
            'title'=>  'Full_access',
            'alias'=> 'Full_access',
            ],
            [
            'title'=>  'Role Access',
            'alias'=> 'Role_access',
            ],
        ]);
    }
}
