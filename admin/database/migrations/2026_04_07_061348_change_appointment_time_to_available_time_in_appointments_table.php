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
        Schema::table('appointments', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['appointment_time', 'end_time']);
            
            // Add new column
            $table->string('available_time')->after('appointment_date');
            
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('appointments', 'status')) {
                $table->enum('status', ['Scheduled', 'Completed', 'Cancelled', 'No Show'])
                      ->default('Scheduled')
                      ->after('available_time');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Drop new column
            $table->dropColumn('available_time');
            
            // Restore old columns
            $table->time('appointment_time')->after('appointment_date');
            $table->time('end_time')->nullable()->after('appointment_time');
        });
    }
};
