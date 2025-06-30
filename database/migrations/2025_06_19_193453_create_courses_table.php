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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->text('objectives');
            $table->text('requirements');
            $table->text('target_audience');

            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'all levels']);

            $table->string('cover_image');      // صورة الغلاف
            $table->string('promo_video');    // الفيديو الترويجي

            $table->boolean('is_free')->default(false);
            $table->unsignedInteger('price')->nullable(); // فقط إذا كانت الدورة غير مجانية

            $table->enum('status', ['pending', 'published', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
