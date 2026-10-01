<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('physical_profiles', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('fitness_level', 20);
            $table->string('daily_activity_level', 20)->nullable();
            $table->decimal('height_cm', 5, 2)->nullable();
            $table->decimal('current_weight_kg', 5, 2)->nullable();
            $table->unsignedInteger('calories_per_day')->nullable();
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('physical_profiles');
    }
};
