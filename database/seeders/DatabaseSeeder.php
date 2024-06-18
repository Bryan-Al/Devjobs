<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Salarioseeder;
use Database\Seeders\CategoriaSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    $this->call(Salarioseeder::class);
    $this->call(CategoriaSeeder::class);
    }
}
