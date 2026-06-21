<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('value')->default(0);
            $table->string('suffix', 10)->nullable();
            $table->string('label', 100);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::table('home_stats')->insert([
            ['value' => 1000, 'suffix' => '+', 'label' => 'Students',          'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['value' => 50,   'suffix' => '+', 'label' => 'Qualified Teachers', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['value' => 100,  'suffix' => '%', 'label' => 'Board Result',      'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['value' => 2000, 'suffix' => '+', 'label' => 'Satisfied Parents', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('home_stats');
    }
};
