<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('nutrition_plan_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('nutrition_plan_version_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('goal')->nullable();
            $table->unsignedInteger('calories')->nullable();
            $table->timestampsTz();
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
