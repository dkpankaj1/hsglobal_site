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
        Schema::create('important_notices', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Important Update');
            $table->string('title');
            $table->text('description');
            $table->string('action')->nullable();
            $table->string('banner')->nullable();
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });

        DB::table('important_notices')->insert([
            'heading' => 'Admission Update',
            'title' => 'Admission Enquiry 2026-27',
            'description' => 'Submit your admission enquiry to get details about eligibility, documents, and the admission process for the new session.',
            'enabled' => true
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('important_notices');
    }
};
