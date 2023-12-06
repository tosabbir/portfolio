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
        Schema::create('comments', function (Blueprint $table) {

            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('contact_subject')->nullable();
            $table->string('contact_budget')->nullable();
            $table->string('message')->nullable();
            $table->string('comment_section')->nullable();
            $table->string('coment_section_id')->nullable();
            $table->string('comment_type')->nullable();
            $table->string('user_img')->nullable();
            $table->string('status')->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
