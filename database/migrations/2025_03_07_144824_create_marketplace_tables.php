<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('market_shops', function (Blueprint $table) {
            $table->id('shop_id');
            $table->string('name');
            $table->string('location')->nullable();
            $table->boolean('is_official_shop')->default(false);
            $table->boolean('is_preferred_plus_seller')->default(false);
            $table->timestamps();
        });

        Schema::create('market_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('shop_id');
            $table->string('name');
            $table->string('currency', 10);
            $table->integer('stock');
            $table->integer('status');
            $table->bigInteger('cat_id');
            $table->string('brand')->nullable();
            $table->integer('sold')->default(0);
            $table->integer('historical_sold')->default(0);
            $table->boolean('liked')->default(false);
            $table->integer('liked_count')->default(0);
            $table->string('item_status', 50);
            $table->timestamps();
        });

        Schema::create('market_labels', function (Blueprint $table) {
            $table->id('label_id');
            $table->timestamps();
        });

        Schema::create('market_item_labels', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('label_id');
            $table->primary(['item_id', 'label_id']);
        });

        Schema::create('market_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->text('image_url');
            $table->timestamps();
        });

        Schema::create('market_pricing', function (Blueprint $table) {
            $table->id('item_id');
            $table->bigInteger('price');
            $table->bigInteger('price_min');
            $table->bigInteger('price_max');
            $table->bigInteger('price_before_discount')->nullable();
            $table->bigInteger('price_min_before_discount')->nullable();
            $table->bigInteger('price_max_before_discount')->nullable();
            $table->string('discount', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('market_pricing');
        Schema::dropIfExists('market_images');
        Schema::dropIfExists('market_item_labels');
        Schema::dropIfExists('market_labels');
        Schema::dropIfExists('market_items');
        Schema::dropIfExists('market_shops');
    }
};
