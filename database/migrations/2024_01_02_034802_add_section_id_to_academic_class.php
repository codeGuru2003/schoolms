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
        Schema::table('academic_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_classes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('section_id');
            $table->dropColumn('section_id');
        });
    }
};
