<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->timestamps();
        });

        DB::table('vision_missions')->insert([
            'vision' => 'To be the leading centre of holistic education in Kushinagar — nurturing young minds to become confident, responsible, and intellectually empowered individuals who contribute positively to society and the world.',
            'mission' => 'To provide a safe, inclusive, and stimulating learning environment that blends academic excellence with co-curricular development, instilling strong values, critical thinking, creativity, and a lifelong love of learning in every student.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('vision_missions');
    }
};
