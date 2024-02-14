<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->integer('kin_type_id')->unsigned()->foreign()->references('id')->on('kin_types');
            $table->integer('employee_id')->unsigned()->foreign()->references('id')->on('employees');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
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
        Schema::dropIfExists('kin');
    }
}
