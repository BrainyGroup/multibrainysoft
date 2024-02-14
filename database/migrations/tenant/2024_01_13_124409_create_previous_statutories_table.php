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
        Schema::create('previous_statutories', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
            $table->integer('statutory_id')->unsigned()->foreign()->references('id')->on('statutories'); 
            $table->date('start_date');
            $table->date('end_date'); 
            $table->decimal('amount',11,2);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_statutories');
    }
};
