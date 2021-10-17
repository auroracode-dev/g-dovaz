<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site_init;

class Site_initSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Site_init::factory(1)->create();
    }
}
