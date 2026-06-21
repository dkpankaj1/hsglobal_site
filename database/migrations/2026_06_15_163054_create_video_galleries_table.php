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
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('yt_url');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        DB::table('video_galleries')->insert([
            [
                'name' => 'Campus Tour – HS Global Academy',
                'description' => 'A walkthrough of our state-of-the-art campus facilities including smart classrooms, labs, library, and playground.',
                'yt_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annual Day Celebration 2025',
                'description' => 'Cultural performances, award ceremony, and speeches from the Annual Day celebration.',
                'yt_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports Meet Highlights 2025',
                'description' => 'Best moments from track events, relay races, and prize distribution ceremony.',
                'yt_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_galleries');
    }
};
