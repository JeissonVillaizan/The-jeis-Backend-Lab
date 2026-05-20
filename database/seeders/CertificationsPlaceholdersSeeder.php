<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificationsPlaceholdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            'certifications.placeholders.title' => [
                'en' => 'Eg: AWS Certified Developer',
                'es' => 'Ej: AWS Certified Developer',
            ],
            'certifications.placeholders.issuer' => [
                'en' => 'Eg: Amazon',
                'es' => 'Ej: Amazon',
            ],
            'certifications.placeholders.url' => [
                'en' => 'https://example.com/certificate',
                'es' => 'https://example.com/certificate',
            ],
            'certifications.placeholders.secret' => [
                'en' => 'Your secret key',
                'es' => 'Tu clave secreta',
            ],
        ];

        foreach ($entries as $key => $locales) {
            foreach ($locales as $locale => $value) {
                DB::table('translations')->updateOrInsert(
                    ['key' => $key, 'locale' => $locale],
                    ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
                );
            }
        }
    }
}
