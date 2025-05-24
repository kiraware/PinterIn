<?php

use App\Enums\LessonDifficulty;
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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->enum('difficulty', [LessonDifficulty::BEGINNER->value, LessonDifficulty::INTERMEDIATE->value, LessonDifficulty::ADVANCED->value, LessonDifficulty::EXPERT->value])->default(LessonDifficulty::BEGINNER->value);
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });

        Schema::dropIfExists('lessons');
    }
};
