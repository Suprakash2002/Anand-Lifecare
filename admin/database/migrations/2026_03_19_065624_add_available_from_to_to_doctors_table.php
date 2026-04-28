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
        Schema::table('doctors', function (Blueprint $table) {
            // Add new columns
            $table->string('available_from')->nullable()->after('specialization');
            $table->string('available_to')->nullable()->after('available_from');
        });

        // Drop old column if it exists
        if (Schema::hasColumn('doctors', 'available_day')) {
            Schema::table('doctors', function (Blueprint $table) {
                $table->dropColumn('available_day');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('available_from');
            $table->dropColumn('available_to');
        });
    }
};
