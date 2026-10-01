<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workout_session_exercises', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('workout_session_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exercise_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedSmallInteger('sort_order');
            $table->string('exercise_name_snapshot');
            $table->unsignedSmallInteger('planned_sets')->nullable();
            $table->string('planned_repetitions', 50)->nullable();
            $table->unsignedSmallInteger('planned_duration_minutes')->nullable();
            $table->boolean('completed')->default(false);
            $table->text('notes')->nullable();
            $table->unique(['workout_session_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_session_exercises');
    }
};
