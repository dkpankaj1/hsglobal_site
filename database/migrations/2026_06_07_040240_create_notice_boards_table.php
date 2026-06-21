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
        Schema::create('notice_boards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('document')->nullable();
            $table->boolean('is_publish')->default(false);
            $table->timestamps();
        });

        DB::table('notice_boards')->insert([
            [
                'title' => 'Admission Open 2026-27 – Nursery to Class XI',
                'description' => 'Limited seats available. Parents are requested to submit the admission enquiry form at the earliest. Contact the school office for prospectus and registration details.',
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Annual Sports Meet 2025-26 – Results & Gallery',
                'description' => 'The Annual Sports Meet was conducted successfully. Congratulations to all winners! Photos are now available in the Photo Gallery section.',
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fee Payment Due Date – April 2026',
                'description' => 'Parents are requested to pay the monthly fee by the 10th of April 2026. Late payment will attract a penalty of ₹50 per day.',
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Parent-Teacher Meeting – 15th April 2026',
                'description' => 'A PTM is scheduled for all classes on 15th April 2026 from 10:00 AM to 1:00 PM. Attendance is compulsory for all parents.',
                'is_publish' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Summer Vacation – 20th May to 30th June 2026',
                'description' => 'The school will remain closed for summer vacation from 20th May to 30th June 2026. School reopens on 1st July 2026.',
                'is_publish' => false,
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
        Schema::dropIfExists('notice_boards');
    }
};
