<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('statutory_type_id')->unsigned()->foreign()->references('id')->on('statutory_types');
            $table->integer('company_id')->unsigned()->foreign()->references('id')->on('companies');
             $table->integer('country_id')->unsigned()->foreign()->references('id')->on('countries');
            $table->integer('bank_id')->unsigned()->foreign()->references('id')->on('banks');
            $table->string('account_number');
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
        Schema::dropIfExists('organizations');
    }
}
