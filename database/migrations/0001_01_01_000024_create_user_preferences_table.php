<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_preferences', function (Blueprint $table): void {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('preference_id')->constrained()->restrictOnDelete();
            $table->primary(['user_id', 'preference_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
