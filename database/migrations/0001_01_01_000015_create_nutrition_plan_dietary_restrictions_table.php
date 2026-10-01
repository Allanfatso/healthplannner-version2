<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_plan_dietary_restrictions', function (Blueprint $table): void {
            $table->foreignId('nutrition_plan_id')->constrained(indexName: 'npdr_nutrition_plan_fk')->cascadeOnDelete();
            $table->foreignId('dietary_restriction_id')->constrained(indexName: 'npdr_dietary_restriction_fk')->restrictOnDelete();
            $table->primary(['nutrition_plan_id', 'dietary_restriction_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_plan_dietary_restrictions');
    }
};
