<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercise_plans', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('fitness_level', 20);
            $table->unsignedTinyInteger('days_per_week');
            $table->unsignedSmallInteger('session_duration_minutes');
            $table->unsignedSmallInteger('plan_duration_weeks');
            $table->timestampsTz();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_plans');
    }
};
