<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('siteinit');
        Storage::makeDirectory('siteinit');
        Storage::deleteDirectory('product');
        Storage::makeDirectory('product');
        Storage::deleteDirectory('gallery');
        Storage::makeDirectory('gallery');
        Storage::deleteDirectory('post');
        Storage::makeDirectory('post');


        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(Site_initSeeder::class);
    }
}
