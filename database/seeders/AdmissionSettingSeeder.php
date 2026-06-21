<?php

namespace Database\Seeders;

use App\Models\AdmissionSetting;
use Illuminate\Database\Seeder;

class AdmissionSettingSeeder extends Seeder
{
    public function run(): void
    {
        AdmissionSetting::create([
            'is_open'        => true,
            'academic_year'  => '2026-2027',
            'start_date'     => '2026-06-01',
            'end_date'       => '2026-08-31',
            'contact_person' => 'Mr. Sushil Kumar Singh',
            'contact_phone'  => '+91 89605 53332',
            'contact_email'  => 'admission@hsglobalacademy.in',
            'instructions'   => 'Please fill all required fields. Our admission team will contact you within 2-3 working days.',
        ]);
    }
}
