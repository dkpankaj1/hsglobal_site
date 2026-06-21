<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('phone', 20)->nullable();
            $table->string('subject', 200);
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        DB::table('contact_enquiries')->insert([
            [
                'name' => 'Vikram Singh',
                'email' => 'vikram.singh@example.com',
                'phone' => '9812345670',
                'subject' => 'Admission Query for Class III',
                'message' => 'I would like to know about the admission process for Class III. Please share the fee structure and available seats.',
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neha Gupta',
                'email' => 'neha.gupta@example.com',
                'phone' => null,
                'subject' => 'Request for School Tour',
                'message' => 'We are relocating to Kushinagar and would like to visit the school campus before finalizing admission for our two children. Please let us know a suitable time.',
                'is_read' => true,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'name' => 'Amit Kumar',
                'email' => 'amit.kumar@example.com',
                'phone' => '8776655443',
                'subject' => 'Bus Facility Enquiry',
                'message' => 'Do you provide transport facility for students from Hata town? Please share the bus route details and charges.',
                'is_read' => false,
                'created_at' => now()->subHours(3),
                'updated_at' => now()->subHours(3),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_enquiries');
    }
};
