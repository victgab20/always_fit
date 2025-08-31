<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('trainings', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->string('title');
            $t->enum('level', ['beginner','intermediate','advanced'])->index();
            $t->boolean('is_active')->default(true);
            $t->timestamps();
        });

        Schema::create('exercises', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('slug')->unique();
            $t->string('image_path')->nullable();
            $t->timestamps();
        });

        Schema::create('training_exercise', function (Blueprint $t) {
            $t->id();
            $t->foreignId('training_id')->constrained()->cascadeOnDelete();
            $t->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $t->string('subtitle');
            $t->unsignedInteger('goal_total');
            $t->unsignedInteger('order')->default(0);
            $t->timestamps();
            $t->unique(['training_id','exercise_id']);
        });

        Schema::create('exercise_logs', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $t->date('started_at')->nullable();
            $t->unsignedInteger('done')->default(0);
            $t->json('notes')->nullable();
            $t->timestamps();
        });

        Schema::create('nutrition_plans', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->string('title');
            $t->text('short_tip')->nullable();
            $t->longText('long_tip')->nullable();
            $t->timestamps();
        });

        Schema::create('nutrition_sections', function (Blueprint $t) {
            $t->id();
            $t->foreignId('nutrition_plan_id')->constrained()->cascadeOnDelete();
            $t->string('icon', 8)->nullable();
            $t->string('title');
            $t->unsignedInteger('order')->default(0);
            $t->timestamps();
        });

        Schema::create('nutrition_items', function (Blueprint $t) {
            $t->id();
            $t->foreignId('nutrition_section_id')->constrained()->cascadeOnDelete();
            $t->string('text');
            $t->string('note')->nullable();
            $t->unsignedInteger('order')->default(0);
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_items');
        Schema::dropIfExists('nutrition_sections');
        Schema::dropIfExists('nutrition_plans');
        Schema::dropIfExists('exercise_logs');
        Schema::dropIfExists('training_exercise');
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('trainings');
    }
};
