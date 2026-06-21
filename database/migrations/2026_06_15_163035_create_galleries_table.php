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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        DB::table('galleries')->insert([
            [
                'name' => 'Annual Sports Meet 2025',
                'slug' => 'annual-sports-meet-2025',
                'description' => 'Highlights from the Annual Sports Meet held in December 2025. Students participated in various track and field events.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Independence Day Celebration 2025',
                'slug' => 'independence-day-2025',
                'description' => 'Flag hoisting, cultural performances, and speech competition on the occasion of 79th Independence Day.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science Exhibition 2025',
                'slug' => 'science-exhibition-2025',
                'description' => 'Students showcased innovative science projects and working models at the inter-school science exhibition.',
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
        Schema::dropIfExists('galleries');
    }
};
