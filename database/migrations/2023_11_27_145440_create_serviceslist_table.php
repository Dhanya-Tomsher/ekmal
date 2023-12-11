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
        Schema::create('serviceslist', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('position')->default(1);
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceslist');
    }
};
