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
            $table->string('blog_title')->nullable();
            $table->text('blog_short_description')->nullable();
            $table->longText('blog_description')->nullable();
            $table->string('blog_tag')->nullable();
            $table->text('blog_share')->nullable();
            $table->text('blog_comment')->nullable();
            $table->string('blog_category')->nullable();
            $table->string('blog_category_slug')->nullable();
            $table->string('blog_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
