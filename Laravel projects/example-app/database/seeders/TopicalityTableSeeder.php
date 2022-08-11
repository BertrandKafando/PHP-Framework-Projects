<?php

namespace Database\Seeders;

use App\Models\Topicality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topicality:: factory()
                   ->COUNT(30)
                   ->create();
        //
    }
}
