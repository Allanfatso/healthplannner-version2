<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_tag_assignments', function (Blueprint $table): void {
            $table->foreignId('meal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('meal_tag_id')->constrained()->restrictOnDelete();
            $table->primary(['meal_id', 'meal_tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_tag_assignments');
    }
};
