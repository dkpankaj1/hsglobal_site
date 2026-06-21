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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('sort_description');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('highlights')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->timestamps();
        });

        DB::table('facilities')->insert([
            [
                'name' => 'Smart Classrooms',
                'slug' => 'smart-classrooms',
                'sort_description' => 'Spacious, well-organised classrooms with modern technology for an engaging learning experience.',
                'description' => 'Our smart classrooms are equipped with digital boards, projectors, and audio-visual aids that make learning interactive and fun. Each classroom is spacious, well-ventilated, and designed to create a focused academic environment.',
                'thumbnail' => 'static/images/facilities_1.jpg',
                'highlights' => json_encode(['Digital boards', 'Projectors', 'Well-ventilated', 'Ergonomic furniture']),
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computer Lab',
                'slug' => 'computer-lab',
                'sort_description' => 'Modern computer lab with internet access and coding tools for digital literacy.',
                'description' => 'Our computer lab features the latest hardware and software, high-speed internet, and a structured curriculum that builds digital literacy from an early age. Students learn coding, typing, and essential computer skills.',
                'thumbnail' => 'static/images/facilities_2.jpg',
                'highlights' => json_encode(['Latest PCs', 'High-speed internet', 'Coding curriculum', 'Interactive software']),
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science Laboratories',
                'slug' => 'science-lab',
                'sort_description' => 'State-of-the-art Physics, Chemistry, and Biology labs for hands-on practical learning.',
                'description' => 'Our science labs are fully equipped with modern apparatus, specimens, and safety equipment. Students perform experiments under guided supervision, reinforcing theoretical concepts with practical experience.',
                'thumbnail' => 'static/images/facilities_3.jpg',
                'highlights' => json_encode(['Physics lab', 'Chemistry lab', 'Biology lab', 'Safety equipment']),
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Playground & Sports',
                'slug' => 'sports',
                'sort_description' => 'A large playground for outdoor sports, athletics, and physical fitness activities.',
                'description' => 'Our spacious playground accommodates football, cricket, basketball, and athletics. We believe physical fitness is essential for holistic development, and our sports programme encourages teamwork, discipline, and a healthy lifestyle.',
                'thumbnail' => 'static/images/facilities_4.jpg',
                'highlights' => json_encode(['Football ground', 'Cricket pitch', 'Basketball court', 'Athletics track']),
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Library',
                'slug' => 'library',
                'sort_description' => 'A well-stocked library with books, references, and periodicals for all age groups.',
                'description' => 'Our library houses a rich collection of books, encyclopedias, reference materials, magazines, and newspapers. It provides a quiet and comfortable space for reading, research, and self-study.',
                'thumbnail' => 'static/images/facilities_5.jpg',
                'highlights' => json_encode(['5000+ books', 'Reading area', 'Reference section', 'Digital catalog']),
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CCTV & Security',
                'slug' => 'cctv-security',
                'sort_description' => '24x7 CCTV surveillance and trained security personnel ensuring a safe campus.',
                'description' => 'The entire campus is under CCTV surveillance with trained security staff at all entry and exit points. Strict visitor protocols and safety drills ensure a secure environment for students and staff.',
                'thumbnail' => 'static/images/facilities_6.jpg',
                'highlights' => json_encode(['24x7 CCTV', 'Security guards', 'Visitor management', 'Fire safety']),
                'is_publish' => true,
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
        Schema::dropIfExists('facilities');
    }
};
