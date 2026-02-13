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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->integer("old_price");
            $table->integer("new_price");
            $table->longtext("description");
            $table->string("excerpt")->nullable();
            $table->integer("category_id");
            $table->string("brand");
            $table->string("condition");
            $table->string("model_name");
            $table->string("bike_type");
            $table->string("launch_year");
            $table->integer("no_of_cylinder");
            $table->integer("engine_cc");
            $table->integer("max_meter");
            $table->integer("max_torque");
            $table->integer("no_of_gear");
            $table->integer("tank_capacity");
            $table->integer("milage");
            $table->integer("weight");
            $table->string("break_type");
            $table->string("wheel_type");
            $table->string("tyre_type");
            $table->string("headlight");
            $table->string("colors");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
