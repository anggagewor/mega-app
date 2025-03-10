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
        Schema::create('dota2_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('localized_name')->nullable();
            $table->string('primary_attr')->nullable();
            $table->string('attack_type')->nullable();
            $table->string('legs')->nullable();
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dota2_heroes');
    }
};
