<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificationsTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            'nav.certifications' => [
                'en' => 'Certifications',
                'es' => 'Certificaciones',
            ],

            'certifications.page_title' => [
                'en' => 'Certifications',
                'es' => 'Certificaciones',
            ],

            'certifications.page_subtitle' => [
                'en' => 'Manage your professional certifications',
                'es' => 'Administra tus certificaciones profesionales',
            ],

            'certifications.add' => [
                'en' => 'Add',
                'es' => 'Añadir',
            ],

            'certifications.empty' => [
                'en' => 'No certifications yet. Click add to create one.',
                'es' => 'Aún no hay certificaciones. Haz clic en añadir para crear una.',
            ],

            'certifications.add_new' => [
                'en' => 'Add New Certification',
                'es' => 'Añadir nueva certificación',
            ],

            'certifications.fields.title' => [
                'en' => 'Title',
                'es' => 'Título',
            ],

            'certifications.fields.issuer' => [
                'en' => 'Issuer',
                'es' => 'Emisor',
            ],

            'certifications.fields.date' => [
                'en' => 'Date',
                'es' => 'Fecha',
            ],

            'certifications.fields.url' => [
                'en' => 'URL',
                'es' => 'URL',
            ],

            'certifications.fields.image' => [
                'en' => 'Image',
                'es' => 'Imagen',
            ],

            'certifications.fields.image_button' => [
                'en' => 'Choose image',
                'es' => 'Elegir imagen',
            ],

            'certifications.fields.image_selected' => [
                'en' => 'No file selected',
                'es' => 'Sin archivo seleccionado',
            ],

            'certifications.fields.secret' => [
                'en' => 'Secret key',
                'es' => 'Clave secreta',
            ],

            'certifications.fields.secret_prompt' => [
                'en' => 'Are you Jeisson Villaizan?',
                'es' => '¿Eres Jeisson Villaizan?',
            ],

            'certifications.labels.view' => [
                'en' => 'View certificate',
                'es' => 'Ver certificado',
            ],

            'certifications.delete.title' => [
                'en' => 'Delete certificate',
                'es' => 'Eliminar certificado',
            ],

            'certifications.delete.prompt' => [
                'en' => 'You are about to delete: :title',
                'es' => 'Vas a eliminar: :title',
            ],

            'certifications.delete.fallback' => [
                'en' => 'You are about to delete this certificate',
                'es' => 'Vas a eliminar este certificado',
            ],

            'certifications.delete.secret_label' => [
                'en' => 'Are you Jeisson Villaizan?',
                'es' => '¿Eres Jeisson Villaizan?',
            ],

            'certifications.delete.secret_placeholder' => [
                'en' => 'Your password',
                'es' => 'Tu contraseña',
            ],

            'certifications.delete.cancel' => [
                'en' => 'I am a tourist :D',
                'es' => 'soy turista :D',
            ],

            'certifications.delete.confirm' => [
                'en' => 'Delete certificate',
                'es' => 'eliminar certificado',
            ],

            'certifications.errors.not_jeisson' => [
                'en' => 'You are not Jeisson Villaizan!',
                'es' => '¡No eres Jeisson Villaizan!',
            ],

            'certifications.validation.title.required' => [
                'en' => 'The title field is required.',
                'es' => 'El campo título es obligatorio.',
            ],

            'certifications.validation.title.string' => [
                'en' => 'The title field must be a string.',
                'es' => 'El campo título debe ser una cadena de texto.',
            ],

            'certifications.validation.title.max' => [
                'en' => 'The title field may not be greater than 255 characters.',
                'es' => 'El campo título no puede tener más de 255 caracteres.',
            ],

            'certifications.validation.issuer.string' => [
                'en' => 'The issuer field must be a string.',
                'es' => 'El campo emisor debe ser una cadena de texto.',
            ],

            'certifications.validation.issuer.max' => [
                'en' => 'The issuer field may not be greater than 255 characters.',
                'es' => 'El campo emisor no puede tener más de 255 caracteres.',
            ],

            'certifications.validation.date.date' => [
                'en' => 'The date field must be a valid date.',
                'es' => 'El campo fecha debe ser una fecha válida.',
            ],

            'certifications.validation.url.url' => [
                'en' => 'The URL field must be a valid URL.',
                'es' => 'El campo URL debe ser una URL válida.',
            ],

            'certifications.validation.url.max' => [
                'en' => 'The URL field may not be greater than 2048 characters.',
                'es' => 'El campo URL no puede tener más de 2048 caracteres.',
            ],

            'certifications.validation.image.image' => [
                'en' => 'The image field must be an image.',
                'es' => 'El campo imagen debe ser una imagen.',
            ],

            'certifications.validation.image.max' => [
                'en' => 'The image field may not be greater than 2048 kilobytes.',
                'es' => 'El campo imagen no puede ser mayor de 2048 kilobytes.',
            ],

            'certifications.validation.secret.required' => [
                'en' => 'The secret field is required.',
                'es' => 'El campo clave secreta es obligatorio.',
            ],

            'certifications.validation.secret.string' => [
                'en' => 'The secret field must be a string.',
                'es' => 'El campo clave secreta debe ser una cadena de texto.',
            ],

            'certifications.delete.aria_close' => [
                'en' => 'Close delete popup',
                'es' => 'Cerrar popup de eliminación',
            ],

            'certifications.delete.aria_button' => [
                'en' => 'Delete certificate',
                'es' => 'Eliminar certificado',
            ],

            'actions.cancel' => [
                'en' => 'Cancel',
                'es' => 'Cancelar',
            ],

            'actions.save' => [
                'en' => 'Save',
                'es' => 'Guardar',
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
