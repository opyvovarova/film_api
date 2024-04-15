<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Film;
use App\Models\Actor;
use Illuminate\Database\Seeder;

class FilmsAndActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $actors = Actor::factory()->count(10)->create();

       $actors->each(function ($actor) {
           $films = Film::factory()->count(3)->create();
           $actor->films()->attach($films);
       });
    }
}
