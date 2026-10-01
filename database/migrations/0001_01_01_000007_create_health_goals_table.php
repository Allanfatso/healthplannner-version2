<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_goals', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('goal_type', 30);
            $table->string('title')->nullable();
            $table->decimal('target_weight_kg', 5, 2)->nullable();
            $table->date('target_date')->nullable();
            $table->timestampTz('started_at')->useCurrent();
            $table->timestampTz('ended_at')->nullable();
            $table->timestampsTz();
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_goals');
    }
};
