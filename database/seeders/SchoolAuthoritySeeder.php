<?php

namespace Database\Seeders;

use App\Models\SchoolAuthority;
use Illuminate\Database\Seeder;

class SchoolAuthoritySeeder extends Seeder
{
    public function run(): void
    {
        SchoolAuthority::create([
            'name'          => 'Mr. Sushil Kumar Singh',
            'role'          => 'chairman',
            'message'       => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development, we create a safe and inspiring learning environment. Our goal is to ensure that every student who walks through our gates leaves as a confident, capable, and compassionate individual ready to make a difference in the world.',
            'is_published'  => true,
        ]);
        SchoolAuthority::create([
            'name'          => 'Mr. Sushil Kumar Singh',
            'role'          => 'director',
            'message'       => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development, we create a safe and inspiring learning environment. Our goal is to ensure that every student who walks through our gates leaves as a confident, capable, and compassionate individual ready to make a difference in the world.',
            'is_published'  => true,
        ]);

        SchoolAuthority::create([
            'name'          => 'Mr. Roshan Singh',
            'role'          => 'principal',
            'message'       => 'At HS Global Academy, we are committed to fostering academic excellence, discipline, and strong values. Our goal is to create a nurturing environment where students develop critical thinking, creativity, and leadership skills to excel in an ever-evolving world. I believe every child has the potential to achieve greatness, and our role is to guide, encourage, and inspire them every step of the way.',
            'is_published'  => true,
        ]);
    }
}
