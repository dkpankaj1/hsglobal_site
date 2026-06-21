<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name', 100);
            $table->string('admission_class', 50);
            $table->string('parent_name', 100);
            $table->string('phone', 20);
            $table->string('email', 150)->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        DB::table('admission_enquiries')->insert([
            [
                'student_name' => 'Aryan Sharma',
                'admission_class' => 'Class VI',
                'parent_name' => 'Mr. Rajesh Sharma',
                'phone' => '9876543210',
                'email' => 'rajesh.sharma@example.com',
                'message' => 'Looking for admission in Class VI for the academic session 2026-27. Please share the prospectus and fee details.',
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name' => 'Priya Patel',
                'admission_class' => 'Nursery',
                'parent_name' => 'Mrs. Sunita Patel',
                'phone' => '9123456780',
                'email' => 'sunita.patel@example.com',
                'message' => 'My daughter is 3+ years old. Interested in Nursery admission. Please let me know the admission process and documents required.',
                'is_read' => true,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
            [
                'student_name' => 'Rohit Verma',
                'admission_class' => 'Class XI (Science)',
                'parent_name' => 'Mr. Anil Verma',
                'phone' => '9988776655',
                'email' => null,
                'message' => 'My son has passed Class X with 85% marks. Looking for admission in Class XI Science stream. Kindly provide details about subject combinations and fee structure.',
                'is_read' => false,
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_enquiries');
    }
};
