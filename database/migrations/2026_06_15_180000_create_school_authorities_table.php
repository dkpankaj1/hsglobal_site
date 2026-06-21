<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_authorities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('role', 50);               // chairman, director, principal
            $table->string('photo')->nullable();
            $table->text('message')->nullable();
            $table->string('short_description', 300)->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_authorities');
    }
};
