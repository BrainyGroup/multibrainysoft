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
        Schema::create('tenant_details', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->uuid('uuid')->unique();
            $table->string('domain');
            $table->string('name');
            $table->string('description');
            $table->string('email');
            $table->string('mobile');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('database');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_details');
    }
};
