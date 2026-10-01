<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_generation_runs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('plan_type', 20);
            $table->string('provider', 100)->nullable();
            $table->string('provider_model', 100)->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestampTz('requested_at')->useCurrent();
            $table->timestampTz('completed_at')->nullable();
            $table->jsonb('request_snapshot')->nullable();
            $table->jsonb('response_snapshot')->nullable();
            $table->text('failure_message')->nullable();
            $table->index(['user_id', 'requested_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_generation_runs');
    }
};
