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
        Schema::table('student_bills', function (Blueprint $table) {
            $table->string('narration');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_bills', function (Blueprint $table) {
            $table->dropColumn('narration');
            $table->dropConstrainedForeignId('currency_id');
            $table->dropColumn('currency_id');
        });
    }
};
