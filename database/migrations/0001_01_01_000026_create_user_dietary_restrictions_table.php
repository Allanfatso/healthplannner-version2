<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_dietary_restrictions', function (Blueprint $table): void {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dietary_restriction_id')->constrained()->restrictOnDelete();
            $table->primary(['user_id', 'dietary_restriction_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_dietary_restrictions');
    }
};
