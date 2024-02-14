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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();          
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('national_id')->nullable();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();           
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('initials')->nullable();
            $table->string('designation')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->string('storage_limit')->nullable();
            $table->string('pa_email')->nullable();
            $table->boolean('send_welcome_email')->default(false);
            $table->boolean('terms')->default(false);
            $table->boolean('send_start_guide')->default(false);
            $table->string('marital_status')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->foreignId('updated_by')->nullable(); // login user who create the meeting          
            $table->foreignId('created_by')->nullable(); // login user who create the meeting
            $table->foreignId('company_id')->nullable();
            $table->string('sex')->nullable();
            $table->boolean('employee')->nullable();
            $table->softDeletes();
            $table->timestamps();


          

       
          
 


          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
