<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercise_plan_versions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('exercise_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_goal_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('generation_run_id')->nullable()->constrained('plan_generation_runs')->nullOnDelete();
            $table->unsignedInteger('version_number');
            $table->string('fitness_level', 20);
            $table->unsignedTinyInteger('days_per_week');
            $table->unsignedSmallInteger('session_duration_minutes');
            $table->unsignedSmallInteger('plan_duration_weeks');
            $table->timestampTz('valid_from')->useCurrent();
            $table->timestampTz('valid_to')->nullable();
            $table->string('change_reason')->nullable();
            $table->timestampTz('created_at')->useCurrent();
            $table->unique(['exercise_plan_id', 'version_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_plan_versions');
    }
};
