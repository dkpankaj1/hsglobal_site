<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();

            // Contact Information
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->text('contact_address')->nullable();

            // Social Media Links
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();

            // SEO Settings
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();


            $table->timestamps();
        });


        $defaultSettings = [
            // Brand Settings
            'brand_name' => 'HS Global Academy',

            // Contact Information
            'contact_email' => 'contact@hsglobalacademy.in',
            'contact_phone' => '+91 89605 53332, +91 94510 27766',
            'contact_address' => 'Bhaishahi Bazar, Hata, Kushinagar, U.P.',

            // Social Media Links
            'facebook_link' => 'https://www.facebook.com/profile.php?id=61573020811414',
            'twitter_link' => 'https://www.twitter.com/#',
            'instagram_link' => 'https://www.instagram.com/hsglobal_academy/',
            'linkedin_link' => 'https://www.linkedin.com/company/#',

            // SEO Settings
            'meta_title' => 'HS Global Academy - Best School in Kushinagar',
            'meta_description' => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development.',
            'meta_keywords' => 'HS Global Academy, best school in Kushinagar, education, school admission, Kushinagar school, UP school',


            // Timestamps
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('settings')->insert($defaultSettings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
