<?php

use Illuminate\Database\Seeder;
use App\Manufacturer; // ideda modeli kaip klase
use Faker\Factory as Faker; // "as" pervadina klases pavadinima

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      foreach (range(1, 10) as $x) {
        $manufacturer = new Manufacturer();
        $manufacturer->title = $faker->company;
        $manufacturer->website = $faker->url;
        $manufacturer->country = $faker->country;
        $manufacturer->save();
      }
    }
}
