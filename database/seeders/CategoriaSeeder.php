<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\factory as Faker;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake= Faker::create("pr_BR");
        foreach(range(1,5) as $index){
            DB::table('categoria')->insert(
                ['nome'=>$fake->name]
            );
        }
    }
}
