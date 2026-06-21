<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("pages", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->longText("content")->nullable();
            $table->string("image")->nullable();
            $table->string("file")->nullable();
            $table->string("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->boolean("is_published")->default(false);
            $table->timestamps();
        });

        DB::table("pages")->insert([
            ["name" => "Curriculum", "slug" => "curriculum", "content" => "<h2>Our Curriculum</h2><p>HS Global Academy follows the <strong>CBSE</strong> curriculum.</p>", "image" => "static/background/main.jpeg", "file" => null, "meta_title" => "Curriculum - HS Global Academy", "meta_description" => "Explore the CBSE curriculum.", "meta_keywords" => "CBSE, curriculum", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Examination Policy", "slug" => "examination-policy", "content" => "<h2>Examination Policy</h2><p>CCE pattern as prescribed by CBSE.</p>", "image" => null, "file" => null, "meta_title" => "Examination Policy - HS Global Academy", "meta_description" => "Understand the CBSE CCE pattern.", "meta_keywords" => "examination, CCE", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "School Timing", "slug" => "school-timing", "content" => "<h2>School Timing</h2><p>Well-structured schedules.</p>", "image" => null, "file" => null, "meta_title" => "School Timing - HS Global Academy", "meta_description" => "View daily school timings.", "meta_keywords" => "school timing", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Rules & Regulations", "slug" => "rules-regulations", "content" => "<h2>Rules & Regulations</h2><p>Maintain discipline.</p>", "image" => null, "file" => null, "meta_title" => "Rules - HS Global Academy", "meta_description" => "School rules.", "meta_keywords" => "rules, regulations", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Uniform Regulations", "slug" => "uniform-regulations", "content" => "<h2>Uniform Regulations</h2><p>Uniform code.</p>", "image" => null, "file" => null, "meta_title" => "Uniform - HS Global Academy", "meta_description" => "Uniform code.", "meta_keywords" => "uniform", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Book List", "slug" => "book-list", "content" => "<h2>Book List</h2><p>NCERT/CBSE books.</p>", "image" => null, "file" => "static/background/main.jpeg", "meta_title" => "Book List - HS Global Academy", "meta_description" => "Complete book list.", "meta_keywords" => "book list", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Fee Structure", "slug" => "fee-structure", "content" => "<h2>Fee Structure 2026-2027</h2><p>Transparent fee structure.</p>", "image" => null, "file" => null, "meta_title" => "Fee Structure - HS Global Academy", "meta_description" => "Complete fee structure.", "meta_keywords" => "fee structure", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Admission Procedure", "slug" => "admission-procedure", "content" => "<h2>Admission Procedure</h2><p>Transparent, merit-based.</p>", "image" => null, "file" => null, "meta_title" => "Admission Procedure - HS Global Academy", "meta_description" => "Step-by-step admission.", "meta_keywords" => "admission procedure", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Eligibility Criteria", "slug" => "eligibility-criteria", "content" => "<h2>Eligibility Criteria</h2><p>Clear eligibility.</p>", "image" => null, "file" => null, "meta_title" => "Eligibility - HS Global Academy", "meta_description" => "Age and academic criteria.", "meta_keywords" => "eligibility", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Documents Required", "slug" => "documents-required", "content" => "<h2>Documents Required</h2><p>Document checklist.</p>", "image" => null, "file" => null, "meta_title" => "Documents - HS Global Academy", "meta_description" => "Documents checklist.", "meta_keywords" => "documents", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Fee Payment Rules", "slug" => "fee-payment-rules", "content" => "<h2>Fee Payment Rules</h2><p>Structured payment system.</p>", "image" => null, "file" => null, "meta_title" => "Fee Payment Rules - HS Global Academy", "meta_description" => "Payment guidelines.", "meta_keywords" => "fee payment", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "Withdrawal / Transfer", "slug" => "withdrawal-transfer", "content" => "<h2>Withdrawal & Transfer</h2><p>Fair withdrawal policy.</p>", "image" => null, "file" => null, "meta_title" => "Withdrawal - HS Global Academy", "meta_description" => "Withdrawal procedure.", "meta_keywords" => "withdrawal", "is_published" => true, "created_at" => now(), "updated_at" => now()],
            ["name" => "TC Sample", "slug" => "tc-sample", "content" => "<h2>Transfer Certificate Sample</h2><p>Official TC format.</p>", "image" => null, "file" => null, "meta_title" => "TC Sample - HS Global Academy", "meta_description" => "TC sample format.", "meta_keywords" => "TC sample", "is_published" => true, "created_at" => now(), "updated_at" => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists("pages");
    }
};
