<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('core_values', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 50);
            $table->string('title', 100);
            $table->text('text');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('core_values')->insert([
            [
                'icon' => 'fa-star',
                'title' => 'Excellence',
                'text' => 'Pursuing the highest standards in academics, co-curricular activities, and personal development.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-users',
                'title' => 'Integrity',
                'text' => 'Building a culture of trust, honesty, and ethical behaviour in every student and staff member.',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-leaf',
                'title' => 'Innovation',
                'text' => 'Embracing creative, forward-thinking approaches to teaching and learning for a future-ready generation.',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-heart',
                'title' => 'Compassion',
                'text' => 'Cultivating empathy, respect, and a sense of responsibility towards fellow students and the community.',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('core_values');
    }
};
