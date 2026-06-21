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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        // Gallery 1 – Annual Sports Meet
        DB::table('gallery_images')->insert([
            ['gallery_id' => 1, 'image_path' => 'static/gallery/sports1.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 1, 'image_path' => 'static/gallery/sports2.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 1, 'image_path' => 'static/gallery/sports3.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Gallery 2 – Independence Day
        DB::table('gallery_images')->insert([
            ['gallery_id' => 2, 'image_path' => 'static/gallery/independence1.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 2, 'image_path' => 'static/gallery/independence2.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 2, 'image_path' => 'static/gallery/independence3.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Gallery 3 – Science Exhibition
        DB::table('gallery_images')->insert([
            ['gallery_id' => 3, 'image_path' => 'static/gallery/science1.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 3, 'image_path' => 'static/gallery/science2.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
            ['gallery_id' => 3, 'image_path' => 'static/gallery/science3.jpg', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
