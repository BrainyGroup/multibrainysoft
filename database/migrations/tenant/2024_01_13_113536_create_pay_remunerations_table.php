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
        Schema::create('pay_remunerations', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('pay_id')->unsigned()->foreign()->references('id')->on('pays');
            $table->integer('pay_number');
            $table->integer('month');
            $table->integer('year');
            $table->integer('remuneration_id');
            $table->decimal('amount',11,2);    
            $table->decimal('balance',11,2);       
            $table->integer('remuneration_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_remunerations');
    }
};
