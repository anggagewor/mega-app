<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('scraped_laptops', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->enum('status', ['pending', 'processing', 'done', 'error'])->default('pending');
            $table->timestamp('last_checked')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scraped_laptops');
    }
};
