<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Remuneration_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('remuneration_types')->truncate();

      DB::table('remuneration_types')->insert([
              'name' => 'Director',
              'description' => 'Director remuneration',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('remuneration_types')->insert([
              'name' => 'Mobile',
              'description' => 'Mobile remuneration',
              'company_id' => 1,
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);


  
    }
}
