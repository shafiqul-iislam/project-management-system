<?php

use App\Enums\TaskStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->foreignIdFor(\App\Models\Project::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Developer::class, 'developer_id')->constrained()->cascadeOnDelete();
            $table->enum('status', TaskStatusEnum::values())->default(TaskStatusEnum::TODO->value);
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->timestamps();

            $table->index('project_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
