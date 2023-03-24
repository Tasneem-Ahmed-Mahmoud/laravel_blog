<?php

namespace Database\Seeders;

use Illuminate\Contracts\Database\Query\Builder as DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PovitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

DB::table('category_post')->delete();
DB::table('category_post')->insert(array(
    ["category_id"=>1 ,"post_id"=>5],
    ["category_id"=>2 ,"post_id"=>4],
    ["category_id"=>3 ,"post_id"=>3],
    ["category_id"=>4 ,"post_id"=>2],
    ["category_id"=>5 ,"post_id"=>1],

));
DB::table('post_tag')->delete();
DB::table('post_tag')->insert(array(
    ["tag_id"=>1 ,"post_id"=>5],
    ["tag_id"=>2 ,"post_id"=>4],
    ["tag_id"=>3 ,"post_id"=>3],
    ["tag_id"=>4 ,"post_id"=>2],
    ["tag_id"=>5 ,"post_id"=>1],

));




    }
}
