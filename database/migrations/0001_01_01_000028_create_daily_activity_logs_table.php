<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_activity_logs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('activity_date');
            $table->unsignedInteger('steps')->nullable();
            $table->unsignedInteger('active_minutes')->nullable();
            $table->unsignedInteger('calories_burned')->nullable();
            $table->unsignedSmallInteger('sleep_minutes')->nullable();
            $table->string('source', 20)->default('manual');
            $table->timestampsTz();
            $table->unique(['user_id', 'activity_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_activity_logs');
    }
};
