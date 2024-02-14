<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PermissionTableSeeder::class,               
            
            
            UsersTableSeeder::class,
                 
            CountriesTableSeeder::class,
            Salary_basesTableSeeder::class,
            PayesTableSeeder::class,
            Statutory_typesTableSeeder::class,
            OrganizationsTableSeeder::class,
            StatutoriesTableSeeder::class,
            BanksTableSeeder::class,
            CentersTableSeeder::class,
            EmployeesTableSeeder::class,
            ScalesTableSeeder::class,
            SalariesTableSeeder::class,
           
            Deduction_typesTableSeeder::class,
            Allowance_typesTableSeeder::class,
            Remuneration_typesTableSeeder::class,
            DeductionsTableSeeder::class,           
            AllowancesTableSeeder::class,

            CompaniesTableSeeder::class,
            CreateAdminUserSeeder::class, 
            BanksTableSeeder::class,    
        ]);
    
    }
}
