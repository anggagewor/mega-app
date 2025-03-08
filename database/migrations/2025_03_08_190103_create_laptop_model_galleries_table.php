<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laptop_model_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laptop_model_id')->constrained('laptop_models')->onDelete('cascade');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laptop_model_galleries');
    }
};
