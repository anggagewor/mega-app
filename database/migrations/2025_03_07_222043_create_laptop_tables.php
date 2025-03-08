<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopTables extends Migration
{
    public function up()
    {
        Schema::create('laptop_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('laptop_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('model');
            $table->string('part_number');
            $table->year('release_year')->nullable();
            $table->float('weight')->nullable();
            $table->float('display_size')->nullable();
            $table->string('resolution')->nullable();
            $table->integer('battery_capacity')->nullable();
            $table->timestamps();
        });

        Schema::create('laptop_processors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('brand');
            $table->string('model');
            $table->integer('cores');
            $table->integer('threads');
            $table->float('base_clock');
            $table->float('turbo_clock')->nullable();
            $table->integer('tdp_watt');
            $table->timestamps();
        });

        Schema::create('laptop_gpus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('brand');
            $table->string('model');
            $table->integer('vram')->nullable();
            $table->boolean('is_integrated');
            $table->timestamps();
        });

        Schema::create('laptop_ram_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->integer('total_slots');
            $table->integer('max_capacity');
            $table->string('ram_type');
            $table->integer('max_speed');
            $table->timestamps();
        });

        Schema::create('laptop_storage_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('storage_type');
            $table->integer('total_slots');
            $table->integer('max_capacity');
            $table->timestamps();
        });

        Schema::create('laptop_ports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('port_type');
            $table->integer('quantity');
            $table->string('version')->nullable();
            $table->timestamps();
        });

        Schema::create('laptop_power_specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->integer('adapter_watt');
            $table->float('battery_watt_hour');
            $table->string('charger_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptop_power_specs');
        Schema::dropIfExists('laptop_ports');
        Schema::dropIfExists('laptop_storage_slots');
        Schema::dropIfExists('laptop_ram_slots');
        Schema::dropIfExists('laptop_gpus');
        Schema::dropIfExists('laptop_processors');
        Schema::dropIfExists('laptop_models');
        Schema::dropIfExists('laptop_brands');
    }
}
