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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('placeofbirth');
            $table->string('contact')->unique();
            $table->string('email_address')->unique();
            $table->string('current_address');
            $table->date('year_of_employment');
            $table->string('qualifications');
            $table->boolean('is_active');
            $table->string('emergency_contact_person');
            $table->string('emergency_contact_number');
            $table->string('relationship');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
