<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workout_sessions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exercise_plan_version_id')->nullable()->constrained()->nullOnDelete();
            $table->timestampTz('started_at');
            $table->timestampTz('completed_at')->nullable();
            $table->string('status', 20)->default('in_progress');
            $table->unsignedTinyInteger('perceived_exertion')->nullable();
            $table->text('notes')->nullable();
            $table->timestampsTz();
            $table->index(['user_id', 'started_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_sessions');
    }
};
