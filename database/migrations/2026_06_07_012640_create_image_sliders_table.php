<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('image_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('alt_text');
            $table->string('slider_image');
            $table->timestamps();
        });

        DB::table('image_sliders')->insert([
            ['alt_text' => 'HS Global Academy Campus', 'slider_image' => 'static/sliders/slider1.png', 'created_at' => now(), 'updated_at' => now()],
            ['alt_text' => 'Academic Excellence', 'slider_image' => 'static/sliders/slider2.png', 'created_at' => now(), 'updated_at' => now()],
            ['alt_text' => 'Sports & Activities', 'slider_image' => 'static/sliders/slider3.png', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_sliders');
    }
};
