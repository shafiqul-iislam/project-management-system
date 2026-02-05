<?php

use App\Enums\ProjectStatusEnum;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('status', ProjectStatusEnum::values())->default(ProjectStatusEnum::PENDING->value);
            $table->date('started_at')->nullable();
            $table->date('ended_at')->nullable();
            $table->date('finished_at')->nullable();
            $table->string('created_by_username')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
