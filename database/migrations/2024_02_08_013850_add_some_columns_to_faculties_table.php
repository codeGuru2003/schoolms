<?php

use App\Models\Faculty;
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
        Schema::table('faculties', function (Blueprint $table) {
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropConstrainedForeignId('position_id');
            $table->dropColumn('position_id');
            $table->dropConstrainedForeignId('marital_status_id');
            $table->dropColumn('marital_status_id');
            $table->dropConstrainedForeignId('gender_id');
            $table->dropColumn('gender_id');
        });
    }
};
