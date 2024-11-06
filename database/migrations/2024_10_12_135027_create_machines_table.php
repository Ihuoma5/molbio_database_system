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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('machine_id')->unique(); // Unique identifier for each machine
            $table->enum('machine_type', ['Trueprep', 'Truelab', 'Printer']); // Restricted machine types
            $table->date('installation_date'); // Installation date
            $table->string('location'); // Location or facility of the machine
            $table->enum('status', ['active', 'in repair', 'out of service']); // Status
            $table->date('maintenance_schedule')->nullable(); // Maintenance schedule
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
