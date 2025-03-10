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
        Schema::create('dota2_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('personaname')->nullable();
            $table->string('name')->nullable();
            $table->string('plus')->nullable();
            $table->string('cheese')->nullable();
            $table->string('steamid')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatarmedium')->nullable();
            $table->string('avatarfull')->nullable();
            $table->string('profileurl')->nullable();
            $table->string('last_login')->nullable();
            $table->string('loccountrycode')->nullable();
            $table->string('status')->nullable();
            $table->string('fh_unavailable')->nullable();
            $table->string('is_contributor')->nullable();
            $table->string('is_subscriber')->nullable();
            $table->string('rank_tier')->nullable();
            $table->string('leaderboard_rank')->nullable();
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dota2_players');
    }
};
