<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_health_conditions', function (Blueprint $table): void {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_condition_id')->constrained()->restrictOnDelete();
            $table->text('notes')->nullable();
            $table->primary(['user_id', 'health_condition_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_health_conditions');
    }
};
