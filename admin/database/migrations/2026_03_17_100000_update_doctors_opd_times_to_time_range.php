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
            // Drop old column if it exists
            if (Schema::hasColumn('doctors', 'opd_times')) {
                $table->dropColumn('opd_times');
            }
            
            // Add new time columns
            $table->time('opd_start_time')->nullable()->after('available_day');
            $table->time('opd_end_time')->nullable()->after('opd_start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('opd_start_time');
            $table->dropColumn('opd_end_time');
            $table->text('opd_times')->nullable()->after('available_day');
        });
    }
};
