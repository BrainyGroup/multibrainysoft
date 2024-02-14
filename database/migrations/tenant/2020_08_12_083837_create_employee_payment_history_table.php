<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payment_history', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');          
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('statutories'); 
            $table->integer('pay_number');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('amount',11,2);
            $table->date('pay_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_payment_history');
    }
}
