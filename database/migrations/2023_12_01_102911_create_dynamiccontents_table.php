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
        Schema::create('dynamiccontents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamiccontents');
    }
};
