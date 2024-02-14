<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'list roles',
            'create roles',
            'edit roles',
            'delete roles',

            'list users',
            'create users',
            'edit users',
            'delete users', 
            
            'list allowance_types',
            'create allowance_types',
            'edit allowance_types',
            'delete allowance_types',

            'list allowances',
            'create allowances',
            'edit allowances',
            'delete allowances',


            'list banks',
            'create banks',
            'edit banks',
            'delete banks',

            'list basic_settings',
            'create basic_settings',
            'edit basic_settings',
            'delete basic_settings', 
            
            'list centers',
            'create centers',
            'edit centers',
            'delete centers',

            'list companies',
            'create companies',
            'edit companies',
            'delete companies',

            'list contributions',
            'create contributions',
            'edit contributions',
            'delete contributions', 
            
            'list countries',
            'create countries',
            'edit countries',
            'delete countries',

            'list deduction_types',
            'create deduction_types',
            'edit deduction_types',
            'delete deduction_types',


            'list deductions',
            'create deductions',
            'edit deductions',
            'delete deductions',

            'list departments',
            'create departments',
            'edit departments',
            'delete departments', 
            
            'list designations',
            'create designations',
            'edit designations',
            'delete designations',

            'list documentations',
            'create documentations',
            'edit documentations',
            'delete documentations',


            'list employees',
            'create employees',
            'edit employees',
            'delete employees',

            'list employee_statutories',
            'create employee_statutories',
            'edit employee_statutories',
            'delete employee_statutories', 
            
            'list employment_types',
            'create employment_types',
            'edit employment_types',
            'delete employment_types',

            'list kin_types',
            'create kin_types',
            'edit kin_types',
            'delete kin_types',


            'list kins',
            'create kins',
            'edit kins',
            'delete kins',

            'list levels',
            'create levels',
            'edit levels',
            'delete levels', 
            
            'list net_by_banks',
            'create net_by_banks',
            'edit net_by_banks',
            'delete net_by_banks',

            'list organizations',
            'create organizations',
            'edit organizations',
            'delete organizations',


            'list pay_allowances',
            'create pay_allowances',
            'edit pay_allowances',
            'delete pay_allowances',

            'list pay_bases',
            'create pay_bases',
            'edit pay_bases',
            'delete pay_bases', 
            
            'list pay_deductions',
            'create pay_deductions',
            'edit pay_deductions',
            'delete pay_deductions',

            'list pay_statutories',
            'create pay_statutories',
            'edit pay_statutories',
            'delete pay_statutories',


            'list pays',
            'create pays',
            'edit pays',
            'delete pays',

            'list payes',
            'create payes',
            'edit payes',
            'delete payes', 

            'list previous_statutories',
            'create previous_statutories',
            'edit previous_statutories',
            'delete previous_statutories',

            
            'list payments',
            'create payroll_groups',            
            'delete salary_bases',

            'list remunerations',
            'create remunerations',
            'edit remunerations',
            'delete remunerations',

            'list remuneration_types',
            'create remuneration_types',
            'edit remuneration_types',
            'delete remuneration_types',

            'list salaries',
            'create salaries',
            'edit salaries',
            'delete salaries',

            'list scales',
            'create scales',
            'edit scales',
            'delete scales', 
            
            'list settings',
            'create settings',
            'edit settings',
            'delete settings',

            'list statutory_types',
            'create statutory_types',
            'edit statutory_types',
            'delete statutory_types',

            'list statutory_payments',
            'create statutory_payments',
            'edit statutory_payments',
            'delete statutory_payments',

            'list statutories',
            'create statutories',
            'edit statutories',
            'delete statutories', 
            
            'list dashboards',
           


            'list reports',
            'create reports',
            'edit reports',
            'delete reports',



         ];

        //  foreach ($permissions as $permission) {
        //     // Permission::create(['guard_name' => 'sanctum', 'name' => $permission ]);
        //     Permission::create(['name' => $permission]);
        //  }

         foreach ($permissions as $permission) {
            // Permission::create(['guard_name' => 'sanctum', 'name' => $permission ]);
            Permission::create(['name' => $permission]);
         }
    }
}
