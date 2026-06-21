<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('established_year')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('affiliation_no')->nullable();
            $table->string('school_no')->nullable();
            $table->text('description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('about_image')->nullable();
            $table->json('highlights')->nullable();
            $table->json('achievements')->nullable();
            $table->timestamps();
        });

        DB::table('about_settings')->insert([
            'school_name'     => 'H.S. Global Academy',
            'established_year' => '2019',
            'affiliation'     => 'Central Board of Secondary Education (CBSE)',
            'affiliation_no'  => 'Applied',
            'school_no'       => 'Applied',
            'description'     => 'Welcome to HS Global Academy, the best school in Kushinagar, where education meets excellence. We are dedicated to providing high-quality learning experiences, modern infrastructure, and a nurturing environment that helps students achieve their full potential.',
            'long_description' => 'At HS Global Academy, we focus on both academic and extracurricular development, ensuring that students receive a well-rounded education. Our campus features state-of-the-art Biology, Physics, Chemistry, and Computer Labs, allowing students to gain hands-on experience and practical knowledge.',
            'highlights'      => json_encode([
                'Best School in Kushinagar',
                'State-of-the-art Science & Computer Labs',
                'Well-stocked Library & Big Playground',
                'CCTV-secured Safe Campus',
                'Experienced & Qualified Faculty',
                'Holistic Academic & Co-curricular Development',
            ]),
            'achievements'    => json_encode([
                ['icon' => 'fa-trophy', 'title' => 'Best School in Kushinagar', 'desc' => 'Recognised as the best school in Kushinagar for consistent academic excellence and holistic student development.', 'year' => '2025'],
                ['icon' => 'fa-graduation-cap', 'title' => '100% Board Results', 'desc' => 'HS Global Academy has maintained a 100% board result since its establishment.', 'year' => '2025'],
                ['icon' => 'fa-futbol-o', 'title' => 'Sports Excellence', 'desc' => 'Our students actively participate in district and state-level sports events.', 'year' => '2025'],
                ['icon' => 'fa-star', 'title' => 'Modern Infrastructure', 'desc' => 'State-of-the-art Biology, Physics, Chemistry, and Computer Labs.', 'year' => '2024'],
                ['icon' => 'fa-shield', 'title' => 'Safe & Secure Campus', 'desc' => 'CCTV surveillance, trained security personnel, and strict safety protocols.', 'year' => '2024'],
                ['icon' => 'fa-users', 'title' => 'Experienced Faculty', 'desc' => 'Our team of qualified and dedicated teachers provides personalised attention.', 'year' => '2024'],
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};
