<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            'title'=>  'Administrator',
            'alias'=> 'ADMINISTRATOR',
            ],
            [
            'title'=>  'Moderator',
            'alias'=> 'MODERATOR',
            ],
        ]);
    }
}
