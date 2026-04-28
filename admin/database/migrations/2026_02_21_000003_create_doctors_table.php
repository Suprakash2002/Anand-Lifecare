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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('available_from')->nullable()->after('specialization')->comment('Day from (e.g., Monday)');
            $table->string('available_to')->nullable()->after('available_from')->comment('Day to (e.g., Friday)');
            $table->text('opd_times')->nullable()->after('available_to')->comment('Comma-separated time slots');

            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('specialization');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('available_from');
            $table->dropColumn('available_to');
            $table->dropColumn('opd_times');
        });
    }
};
