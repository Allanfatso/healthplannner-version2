<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workout_sets', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('workout_session_exercise_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('set_number');
            $table->unsignedSmallInteger('repetitions')->nullable();
            $table->decimal('weight_kg', 7, 2)->nullable();
            $table->unsignedInteger('duration_seconds')->nullable();
            $table->boolean('completed')->default(true);
            $table->timestampTz('created_at')->useCurrent();
            $table->unique(['workout_session_exercise_id', 'set_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_sets');
    }
};
