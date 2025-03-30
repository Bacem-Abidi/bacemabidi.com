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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // For SEO-friendly URLs
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable(); // Path to image
            $table->boolean('is_published')->default(false);
            $table->date('blog_date')->nullable();
            $table->unsignedSmallInteger('estimated_reading_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
