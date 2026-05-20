<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TranslationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $translations = [
            ['key' => 'header.default_title', 'locale' => 'en', 'value' => 'Dashboard'],
            ['key' => 'header.default_title', 'locale' => 'es', 'value' => 'Dashboard'],
            ['key' => 'header.default_subtitle', 'locale' => 'en', 'value' => 'Welcome to your professional portfolio'],
            ['key' => 'header.default_subtitle', 'locale' => 'es', 'value' => 'Bienvenido a tu portafolio profesional'],

            ['key' => 'nav.dashboard', 'locale' => 'en', 'value' => 'Dashboard'],
            ['key' => 'nav.dashboard', 'locale' => 'es', 'value' => 'Dashboard'],
            ['key' => 'nav.projects', 'locale' => 'en', 'value' => 'Projects'],
            ['key' => 'nav.projects', 'locale' => 'es', 'value' => 'Proyectos'],
            ['key' => 'nav.settings', 'locale' => 'en', 'value' => 'Settings'],
            ['key' => 'nav.settings', 'locale' => 'es', 'value' => 'Configuracion'],

            ['key' => 'home.page_title', 'locale' => 'en', 'value' => 'Dashboard'],
            ['key' => 'home.page_title', 'locale' => 'es', 'value' => 'Dashboard'],
            ['key' => 'home.page_subtitle', 'locale' => 'en', 'value' => 'Welcome to my web portfolio'],
            ['key' => 'home.page_subtitle', 'locale' => 'es', 'value' => 'Bienvenido a mi Portafolio web'],

            ['key' => 'home.stats.completed_projects', 'locale' => 'en', 'value' => 'Completed Projects'],
            ['key' => 'home.stats.completed_projects', 'locale' => 'es', 'value' => 'Proyectos Completados'],
            ['key' => 'home.stats.completed_projects_change', 'locale' => 'en', 'value' => '↑ 2 this month'],
            ['key' => 'home.stats.completed_projects_change', 'locale' => 'es', 'value' => '↑ 2 este mes'],
            ['key' => 'home.stats.month_visits', 'locale' => 'en', 'value' => 'Visits This Month'],
            ['key' => 'home.stats.month_visits', 'locale' => 'es', 'value' => 'Visitas Este Mes'],
            ['key' => 'home.stats.month_visits_change', 'locale' => 'en', 'value' => '↑ 12% vs last month'],
            ['key' => 'home.stats.month_visits_change', 'locale' => 'es', 'value' => '↑ 12% comparado'],
            ['key' => 'home.stats.skills', 'locale' => 'en', 'value' => 'Skills'],
            ['key' => 'home.stats.skills', 'locale' => 'es', 'value' => 'Habilidades'],
            ['key' => 'home.stats.skills_in_progress', 'locale' => 'en', 'value' => '3 in progress'],
            ['key' => 'home.stats.skills_in_progress', 'locale' => 'es', 'value' => '3 en progreso'],
            ['key' => 'home.stats.contacts_received', 'locale' => 'en', 'value' => 'Contacts Received'],
            ['key' => 'home.stats.contacts_received', 'locale' => 'es', 'value' => 'Contactos Recibidos'],
            ['key' => 'home.actions.contact', 'locale' => 'en', 'value' => 'Contact Me'],
            ['key' => 'home.actions.contact', 'locale' => 'es', 'value' => 'Contactame'],
            ['key' => 'contacts.modal.title', 'locale' => 'en', 'value' => 'Contact Me'],
            ['key' => 'contacts.modal.title', 'locale' => 'es', 'value' => 'Contactame'],
            ['key' => 'contacts.fields.email', 'locale' => 'en', 'value' => 'Email'],
            ['key' => 'contacts.fields.email', 'locale' => 'es', 'value' => 'Correo electronico'],
            ['key' => 'contacts.fields.subject', 'locale' => 'en', 'value' => 'Subject'],
            ['key' => 'contacts.fields.subject', 'locale' => 'es', 'value' => 'Asunto'],
            ['key' => 'contacts.fields.message', 'locale' => 'en', 'value' => 'Message'],
            ['key' => 'contacts.fields.message', 'locale' => 'es', 'value' => 'Mensaje'],
            ['key' => 'contacts.placeholders.email', 'locale' => 'en', 'value' => 'you@example.com'],
            ['key' => 'contacts.placeholders.email', 'locale' => 'es', 'value' => 'tu@correo.com'],
            ['key' => 'contacts.placeholders.subject', 'locale' => 'en', 'value' => 'How can I help you?'],
            ['key' => 'contacts.placeholders.subject', 'locale' => 'es', 'value' => 'Como puedo ayudarte?'],
            ['key' => 'contacts.placeholders.message', 'locale' => 'en', 'value' => 'Write your message here...'],
            ['key' => 'contacts.placeholders.message', 'locale' => 'es', 'value' => 'Escribe tu mensaje aqui...'],
            ['key' => 'contacts.success.saved', 'locale' => 'en', 'value' => 'Your message has been saved.'],
            ['key' => 'contacts.success.saved', 'locale' => 'es', 'value' => 'Tu mensaje ha sido guardado.'],
            ['key' => 'contacts.validation.email.required', 'locale' => 'en', 'value' => 'The email field is required.'],
            ['key' => 'contacts.validation.email.required', 'locale' => 'es', 'value' => 'El campo correo electronico es obligatorio.'],
            ['key' => 'contacts.validation.email.email', 'locale' => 'en', 'value' => 'The email field must be a valid email address.'],
            ['key' => 'contacts.validation.email.email', 'locale' => 'es', 'value' => 'El campo correo electronico debe ser una direccion de correo valida.'],
            ['key' => 'contacts.validation.email.max', 'locale' => 'en', 'value' => 'The email field may not be greater than 255 characters.'],
            ['key' => 'contacts.validation.email.max', 'locale' => 'es', 'value' => 'El campo correo electronico no puede tener mas de 255 caracteres.'],
            ['key' => 'contacts.validation.subject.required', 'locale' => 'en', 'value' => 'The subject field is required.'],
            ['key' => 'contacts.validation.subject.required', 'locale' => 'es', 'value' => 'El campo asunto es obligatorio.'],
            ['key' => 'contacts.validation.subject.string', 'locale' => 'en', 'value' => 'The subject field must be a string.'],
            ['key' => 'contacts.validation.subject.string', 'locale' => 'es', 'value' => 'El campo asunto debe ser una cadena de texto.'],
            ['key' => 'contacts.validation.subject.max', 'locale' => 'en', 'value' => 'The subject field may not be greater than 255 characters.'],
            ['key' => 'contacts.validation.subject.max', 'locale' => 'es', 'value' => 'El campo asunto no puede tener mas de 255 caracteres.'],
            ['key' => 'contacts.validation.message.required', 'locale' => 'en', 'value' => 'The message field is required.'],
            ['key' => 'contacts.validation.message.required', 'locale' => 'es', 'value' => 'El campo mensaje es obligatorio.'],
            ['key' => 'contacts.validation.message.string', 'locale' => 'en', 'value' => 'The message field must be a string.'],
            ['key' => 'contacts.validation.message.string', 'locale' => 'es', 'value' => 'El campo mensaje debe ser una cadena de texto.'],
            ['key' => 'contacts.validation.message.max', 'locale' => 'en', 'value' => 'The message field may not be greater than 5000 characters.'],
            ['key' => 'contacts.validation.message.max', 'locale' => 'es', 'value' => 'El campo mensaje no puede tener mas de 5000 caracteres.'],

            ['key' => 'home.welcome.title', 'locale' => 'en', 'value' => 'Welcome to my Backendlab'],
            ['key' => 'home.welcome.title', 'locale' => 'es', 'value' => 'Bienvenido a mi Backendlab'],
            ['key' => 'home.welcome.description', 'locale' => 'en', 'value' => 'This is my space to show my work, skills, and projects. I also track my progress and organize my professional journey here. Explore freely!'],
            ['key' => 'home.welcome.description', 'locale' => 'es', 'value' => 'Este es mi espacio para demostrarte mi trabajo, habilidades y proyectos, ademas, aqui registro mis logros y organizo mi vida laboral. ¡Explora a tu gusto!'],
            ['key' => 'home.actions.github', 'locale' => 'en', 'value' => 'View my GitHub'],
            ['key' => 'home.actions.github', 'locale' => 'es', 'value' => 'Ver mi Github'],
            ['key' => 'home.actions.resume', 'locale' => 'en', 'value' => 'View Resume'],
            ['key' => 'home.actions.resume', 'locale' => 'es', 'value' => 'Ver Curriculum'],
            ['key' => 'home.actions.contact', 'locale' => 'en', 'value' => 'Contact Me'],
            ['key' => 'home.actions.contact', 'locale' => 'es', 'value' => 'Contactame'],
            ['key' => 'contacts.modal.title', 'locale' => 'en', 'value' => 'Contact Me'],
            ['key' => 'contacts.modal.title', 'locale' => 'es', 'value' => 'Contactame'],
            ['key' => 'contacts.fields.email', 'locale' => 'en', 'value' => 'Email'],
            ['key' => 'contacts.fields.email', 'locale' => 'es', 'value' => 'Correo electronico'],
            ['key' => 'contacts.fields.subject', 'locale' => 'en', 'value' => 'Subject'],
            ['key' => 'contacts.fields.subject', 'locale' => 'es', 'value' => 'Asunto'],
            ['key' => 'contacts.fields.message', 'locale' => 'en', 'value' => 'Message'],
            ['key' => 'contacts.fields.message', 'locale' => 'es', 'value' => 'Mensaje'],
            ['key' => 'contacts.placeholders.email', 'locale' => 'en', 'value' => 'you@example.com'],
            ['key' => 'contacts.placeholders.email', 'locale' => 'es', 'value' => 'tu@correo.com'],
            ['key' => 'contacts.placeholders.subject', 'locale' => 'en', 'value' => 'How can I help you?'],
            ['key' => 'contacts.placeholders.subject', 'locale' => 'es', 'value' => 'Como puedo ayudarte?'],
            ['key' => 'contacts.placeholders.message', 'locale' => 'en', 'value' => 'Write your message here...'],
            ['key' => 'contacts.placeholders.message', 'locale' => 'es', 'value' => 'Escribe tu mensaje aqui...'],
            ['key' => 'contacts.success.saved', 'locale' => 'en', 'value' => 'Your message has been saved.'],
            ['key' => 'contacts.success.saved', 'locale' => 'es', 'value' => 'Tu mensaje ha sido guardado.'],
            ['key' => 'contacts.validation.email.required', 'locale' => 'en', 'value' => 'The email field is required.'],
            ['key' => 'contacts.validation.email.required', 'locale' => 'es', 'value' => 'El campo correo electronico es obligatorio.'],
            ['key' => 'contacts.validation.email.email', 'locale' => 'en', 'value' => 'The email field must be a valid email address.'],
            ['key' => 'contacts.validation.email.email', 'locale' => 'es', 'value' => 'El campo correo electronico debe ser una direccion de correo valida.'],
            ['key' => 'contacts.validation.email.max', 'locale' => 'en', 'value' => 'The email field may not be greater than 255 characters.'],
            ['key' => 'contacts.validation.email.max', 'locale' => 'es', 'value' => 'El campo correo electronico no puede tener mas de 255 caracteres.'],
            ['key' => 'contacts.validation.subject.required', 'locale' => 'en', 'value' => 'The subject field is required.'],
            ['key' => 'contacts.validation.subject.required', 'locale' => 'es', 'value' => 'El campo asunto es obligatorio.'],
            ['key' => 'contacts.validation.subject.string', 'locale' => 'en', 'value' => 'The subject field must be a string.'],
            ['key' => 'contacts.validation.subject.string', 'locale' => 'es', 'value' => 'El campo asunto debe ser una cadena de texto.'],
            ['key' => 'contacts.validation.subject.max', 'locale' => 'en', 'value' => 'The subject field may not be greater than 255 characters.'],
            ['key' => 'contacts.validation.subject.max', 'locale' => 'es', 'value' => 'El campo asunto no puede tener mas de 255 caracteres.'],
            ['key' => 'contacts.validation.message.required', 'locale' => 'en', 'value' => 'The message field is required.'],
            ['key' => 'contacts.validation.message.required', 'locale' => 'es', 'value' => 'El campo mensaje es obligatorio.'],
            ['key' => 'contacts.validation.message.string', 'locale' => 'en', 'value' => 'The message field must be a string.'],
            ['key' => 'contacts.validation.message.string', 'locale' => 'es', 'value' => 'El campo mensaje debe ser una cadena de texto.'],
            ['key' => 'contacts.validation.message.max', 'locale' => 'en', 'value' => 'The message field may not be greater than 5000 characters.'],
            ['key' => 'contacts.validation.message.max', 'locale' => 'es', 'value' => 'El campo mensaje no puede tener mas de 5000 caracteres.'],
            ['key' => 'home.recent_projects', 'locale' => 'en', 'value' => 'Recent Projects'],
            ['key' => 'home.recent_projects', 'locale' => 'es', 'value' => 'Proyectos Recientes'],

            ['key' => 'projects.page_title', 'locale' => 'en', 'value' => 'My Projects'],
            ['key' => 'projects.page_title', 'locale' => 'es', 'value' => 'Mis Proyectos'],
            ['key' => 'projects.page_subtitle', 'locale' => 'en', 'value' => 'Explore the projects I have developed'],
            ['key' => 'projects.page_subtitle', 'locale' => 'es', 'value' => 'Explora los proyectos que he desarrollado'],
            ['key' => 'projects.description', 'locale' => 'en', 'value' => 'Description'],
            ['key' => 'projects.description', 'locale' => 'es', 'value' => 'Descripcion'],
            ['key' => 'projects.technologies', 'locale' => 'en', 'value' => 'Technologies'],
            ['key' => 'projects.technologies', 'locale' => 'es', 'value' => 'Tecnologias'],
            ['key' => 'projects.view_details', 'locale' => 'en', 'value' => 'View Details'],
            ['key' => 'projects.view_details', 'locale' => 'es', 'value' => 'Ver Detalles'],
            ['key' => 'projects.empty', 'locale' => 'en', 'value' => 'No projects available yet.'],
            ['key' => 'projects.empty', 'locale' => 'es', 'value' => 'No hay proyectos disponibles aun.'],
            ['key' => 'projects.empty_short', 'locale' => 'en', 'value' => 'No projects available'],
            ['key' => 'projects.empty_short', 'locale' => 'es', 'value' => 'No hay proyectos disponibles'],

            ['key' => 'status.completed', 'locale' => 'en', 'value' => 'Completed'],
            ['key' => 'status.completed', 'locale' => 'es', 'value' => 'Completado'],
            ['key' => 'status.in_progress', 'locale' => 'en', 'value' => 'In Progress'],
            ['key' => 'status.in_progress', 'locale' => 'es', 'value' => 'En Progreso'],
            ['key' => 'status.planned', 'locale' => 'en', 'value' => 'Planned'],
            ['key' => 'status.planned', 'locale' => 'es', 'value' => 'Planificado'],
        ];

        $now = Carbon::now();

        $translations = array_map(
            static fn (array $item): array => [
                ...$item,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            $translations
        );

        Translation::query()->upsert($translations, ['key', 'locale'], ['value', 'updated_at']);
    }
}
