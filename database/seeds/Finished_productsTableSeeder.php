<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Finished_productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      $limit = 10;

      for ($i = 0; $i <=10; $i++){
          DB::table('finished_products')->insert([
              'name' => $faker->name,
              'description' => $faker->sentence(10),
              'measurement_unit_id' => $faker->numberBetween(1,2)
          ]);
      }
    }
}
