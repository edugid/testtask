<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
ini_set('max_execution_time', 0);
ini_set('memory_limit', -1);

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([OrdersTableSeeder::class]);
    }
}
