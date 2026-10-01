<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meal_macronutrients', function (Blueprint $table): void {
            $table->foreignId('meal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('macronutrient_id')->constrained()->restrictOnDelete();
            $table->decimal('amount', 8, 2);
            $table->primary(['meal_id', 'macronutrient_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_macronutrients');
    }
};
