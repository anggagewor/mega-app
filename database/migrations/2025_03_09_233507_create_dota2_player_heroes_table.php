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
        Schema::create('dota2_player_heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id')->nullable();
            $table->unsignedBigInteger('hero_id')->nullable();
            $table->string('last_played')->nullable();
            $table->string('games')->nullable();
            $table->string('win')->nullable();
            $table->string('with_games')->nullable();
            $table->string('with_win')->nullable();
            $table->string('against_games')->nullable();
            $table->string('against_win')->nullable();
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dota2_player_heroes');
    }
};
