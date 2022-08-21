<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'title'=> 'Home',
                'path'=> '/',
                'parent'=> 0,
                'type'=> 'admin'
            ],
            [
                'title'=> 'About',
                'path'=> '/about',
                'parent'=> 0,
                'type'=> 'admin'
            ],
            [
                'title'=> 'Blog',
                'path'=> '/blog',
                'parent'=> 0,
                'type'=> 'admin'
            ],
            [
                'title'=> 'Contact Me',
                'path'=> '/contact-me',
                'parent'=> 0,
                'type'=> 'admin'
            ],
        ]);
    }
}
