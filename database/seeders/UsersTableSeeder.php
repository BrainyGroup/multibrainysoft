<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      DB::table('users')->insert([
              'name' => 'Godfrey Woiso',
              'title' => 'Mr',
              'first_name' => 'Godfrey',
              'middle_name' => 'Richard',
              'last_name' => 'Woiso',
              'dob' => '1974-02-02',
              'company_id' => 1,
              'profile_photo_path' => 'blank_profile_100_115.png',
              'email' => 'godfrey.woiso@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255754744254',
              'marital_status' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'national_id' => '255754744254',            
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('users')->insert([
              'name' => 'Yahaya Frezier',
              'title' => 'Mr',
              'first_name' => 'Yahaya',
              'middle_name' => 'Athumani',
              'last_name' => 'Frezier',
              'dob' => '1975-06-15',
              'company_id' => 1,
              'profile_photo_path' => 'blank_profile_100_115.png',
              'email' => 'yahaya.frezier2@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255754307151',
              'marital_status' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'national_id' => '19750615-15130-00002-22',
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

      DB::table('users')->insert([
              'name' => 'Seif Maulid',
              'title' => 'Mr',
              'first_name' => 'Seif',
              'middle_name' => '',
              'last_name' => 'Maulid',
              'dob' => '1980-07-20',
              'company_id' => 1,
              'profile_photo_path' => 'blank_profile_100_115.png',
              'email' => 'seif.maulid@datahousetza.com',
              'sex' => 'Male',
              'mobile' => '+255712916916',
              'marital_status' => 1,
              'employee' => true,
              'password' => bcrypt('123456'),
              'national_id' => '255754744254',         
              'created_at' =>now(),
              'updated_at' =>now(),
          ]);

        DB::table('users')->insert([
                'name' => 'Silvano Machangu',
                'title' => 'Mr',
                'first_name' => 'Silvano',
                'middle_name' => '',
                'last_name' => 'Machangu',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'silvano.machangu@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255713680495',
                'marital_status' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',             
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

        DB::table('users')->insert([
                'name' => 'Aron James',
                'title' => 'Mr',
                'first_name' => 'Aron',
                'middle_name' => '',
                'last_name' => 'James',
                'dob' => '1979-02-02',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'aron.james@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255788591751',
                'marital_status' => 1,
                'employee' => true,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',     
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);



        DB::table('users')->insert([
                'name' => 'Rahim Kanjara',
                'title' => 'Mr',
                'first_name' => 'Rahim',
                'middle_name' => '',
                'last_name' => 'Kanjara',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'rahim.kanjara@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255716150594',
                'marital_status' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',               
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);


        DB::table('users')->insert([
                'name' => 'Jeremia Malamka',
                'title' => 'Mr',
                'first_name' => 'Jeremia',
                'middle_name' => '',
                'last_name' => 'Malamka',
                'dob' => '1979-02-02',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'jeremia.malamka@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255656745777',
                'marital_status' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',                
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

        DB::table('users')->insert([
                'name' => 'Alex Makolo',
                'title' => 'Mr',
                'first_name' => 'Alex',
                'middle_name' => '',
                'last_name' => 'Makolo',
                'dob' => '1989-07-20',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'alex.makolo@datahousetza.com',
                'sex' => 'Male',
                'mobile' => '+255683358990',
                'marital_status' => 0,
                'employee' => true,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',                
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);



        DB::table('users')->insert([
                'name' => 'Martha Paul',
                'title' => 'Ms',
                'first_name' => 'Martha',
                'middle_name' => '',
                'last_name' => 'Paul',
                'dob' => '1990-10-05',
                'company_id' => 1,
                'profile_photo_path' => 'blank_profile_100_115.png',
                'email' => 'martha.paul@datahousetza.com',
                'sex' => 'Female',
                'mobile' => '+255753956864',
                'marital_status' => 1,
                'employee' => false,
                'password' => bcrypt('123456'),
                'national_id' => '255754744254',             
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);

            DB::table('users')->insert([
                    'name' => 'John Doe',
                    'title' => 'Mr',
                    'first_name' => 'John',
                    'middle_name' => 'Jerry',
                    'last_name' => 'Doe',
                    'dob' => '1979-02-02',
                    'company_id' => 1,
                    'profile_photo_path' => 'blank_profile_100_115.png',
                    'email' => 'john.doe@datahousetza.com',
                    'sex' => 'Male',
                    'mobile' => '+255754307153',
                    'marital_status' => 0,
                    'employee' => false,
                    'password' => bcrypt('123456'),
                    'national_id' => '255754744254',               
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ]);


                DB::table('users')->insert([
                        'name' => 'Yahaya Frezier',
                        'title' => 'Mr',
                        'first_name' => 'Yahaya',
                        'middle_name' => 'Beatus',
                        'last_name' => 'Frezier',
                        'dob' => '1989-07-20',
                        'company_id' => 1,
                        'profile_photo_path' => 'blank_profile_100_115.png',
                        'email' => 'yahaya.frezier1@datahousetza.com',
                        'sex' => 'Male',
                        'mobile' => '+2557543071222',
                        'marital_status' => 1,
                        'employee' => true,
                        'password' => bcrypt('123456'),
                        'national_id' => '255754744254',                   
                        'created_at' =>now(),
                        'updated_at' =>now(),
                    ]);

                    DB::table('users')->insert([
                            'name' => 'Felista Mushi',
                            'title' => 'Mrs',
                            'first_name' => 'Felista',
                            'middle_name' => 'Andrew',
                            'last_name' => 'Mushi',
                            'dob' => '1990-10-05',
                            'company_id' => 2,
                            'profile_photo_path' => 'blank_profile_100_115.png',
                            'email' => 'felista.mushi@datahousetza.com',
                            'sex' => 'Female',
                            'mobile' => '+255754307152',
                            'marital_status' => 1,
                            'employee' => false,
                            'password' => bcrypt('123456'),
                            'national_id' => '255754744254',                           
                            'created_at' =>now(),
                            'updated_at' =>now(),
                        ]);


    }
}
