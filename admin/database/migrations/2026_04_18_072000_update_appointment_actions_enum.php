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
        Schema::table('appointment_actions', function (Blueprint $table) {
            // Change the ENUM to include 'Not Came' instead of 'No Show'
            $table->enum('status', ['Scheduled', 'Completed', 'Cancelled', 'Not Came'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointment_actions', function (Blueprint $table) {
            // Revert back to old ENUM
            $table->enum('status', ['Scheduled', 'Completed', 'Cancelled', 'No Show'])->change();
        });
    }
};
