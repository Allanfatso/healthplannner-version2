<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exercise_plan_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('exercise_plan_version_id')->nullable()->constrained()->nullOnDelete();
            $table->string('day_label', 50);
            $table->string('name');
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->string('repetitions', 50)->nullable();
            $table->string('sets', 50)->nullable();
            $table->string('equipment')->nullable();
            $table->text('notes')->nullable();
            $table->timestampsTz();
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
