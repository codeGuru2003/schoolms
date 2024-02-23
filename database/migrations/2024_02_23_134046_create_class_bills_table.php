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
        Schema::create('class_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_class_id');
            $table->foreign('academic_class_id')->references('id')->on('academic_classes');
            $table->string('name');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currency_types');
            $table->decimal('amount', 10, 2)->unsigned()->default(0.00);
            $table->boolean('is_active');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_bills');
    }
};
