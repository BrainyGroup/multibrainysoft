<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    //
      DB::statement("
      CREATE OR REPLACE VIEW net_by_banks AS
      (     
        SELECT 
        p.company_id as company_id,
        pay_number,        
        name as bank_name,
        b.id as bank_id,
        SUM(net) as bank_amount,
        SUM(net_balance) as balance,
        SUM(net) - SUM(net_balance) as paid
        
         FROM pays p
        join employees e on p.employee_id = e.id
        join banks b on b.id = e.bank_id
        group by company_id, pay_number, bank_name, b.id       
      )
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS net_by_banks');
    }
};
