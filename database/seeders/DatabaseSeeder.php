<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\BusinessUnit;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@magenta.co.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create Services
        $services = [
            [
                'title' => 'Event Organizer',
                'slug' => 'event-organizer',
                'icon' => 'calendar-check',
                'excerpt' => 'Solusi lengkap untuk penyelenggaraan event korporat dan pemerintahan.',
                'description' => '<p>MAGENTA Event Organizer menyediakan layanan penyelenggaraan event profesional yang mencakup:</p>
                <ul>
                    <li>Corporate Events & Meetings</li>
                    <li>Product Launch & Brand Activation</li>
                    <li>Gala Dinner & Award Ceremony</li>
                    <li>Seminar & Conference</li>
                    <li>Exhibition & Trade Show</li>
                </ul>
                <p>Dengan pengalaman lebih dari satu dekade, kami telah dipercaya oleh berbagai korporasi dan instansi pemerintah untuk menyelenggarakan event berkelas.</p>',
                'sort_order' => 1,
            ],
            [
                'title' => 'Outbound & Training',
                'slug' => 'outbound-training',
                'icon' => 'users',
                'excerpt' => 'Program pelatihan dan team building untuk pengembangan SDM.',
                'description' => '<p>Melalui Bumi Training Center, kami menyediakan program pengembangan SDM yang komprehensif:</p>
                <ul>
                    <li>Outbound Training</li>
                    <li>Team Building Program</li>
                    <li>Leadership Development</li>
                    <li>Character Building</li>
                    <li>Motivational Training</li>
                </ul>',
                'sort_order' => 2,
            ],
            [
                'title' => 'Assessment',
                'slug' => 'assessment',
                'icon' => 'clipboard-list',
                'excerpt' => 'Layanan asesmen profesional untuk evaluasi dan pengembangan.',
                'description' => '<p>Layanan asesmen profesional kami meliputi:</p>
                <ul>
                    <li>Competency Assessment</li>
                    <li>Psychological Assessment</li>
                    <li>Leadership Assessment</li>
                    <li>Team Assessment</li>
                    <li>Organizational Assessment</li>
                </ul>',
                'sort_order' => 3,
            ],
            [
                'title' => 'Recruitment',
                'slug' => 'recruitment',
                'icon' => 'user-plus',
                'excerpt' => 'Solusi rekrutmen profesional untuk kebutuhan SDM perusahaan.',
                'description' => '<p>Layanan rekrutmen dan headhunting profesional:</p>
                <ul>
                    <li>Executive Search</li>
                    <li>Mass Recruitment</li>
                    <li>Contract Hiring</li>
                    <li>HR Consulting</li>
                </ul>',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Business Units
        $units = [
            [
                'name' => 'Bumi Training Center',
                'slug' => 'bumi-training-center',
                'tagline' => 'Building Excellence Through People Development',
                'description' => '<p>Bumi Training Center adalah unit bisnis MAGENTA yang fokus pada pengembangan sumber daya manusia melalui berbagai program pelatihan dan outbound.</p>
                <p>Dengan tim trainer bersertifikasi dan fasilitas lengkap, kami siap membantu perusahaan Anda mengembangkan SDM yang kompeten dan berdaya saing.</p>',
                'services_list' => "Corporate Training\nOutbound Training\nTeam Building\nLeadership Development\nCharacter Building\nMotivational Training",
                'instagram' => 'bumitrainingcenter',
                'color' => '#2563EB',
                'sort_order' => 1,
            ],
            [
                'name' => '87Studio',
                'slug' => '87studio',
                'tagline' => 'Creative Solutions for Your Brand',
                'description' => '<p>87Studio adalah unit bisnis MAGENTA yang bergerak di bidang media production dan branding.</p>
                <p>Kami menyediakan layanan kreatif untuk membangun dan memperkuat citra brand Anda.</p>',
                'services_list' => "Video Production\nPhotography\nBranding & Publication\nGraphic Design\nSocial Media Content\nCompany Profile",
                'instagram' => '87studio_id',
                'color' => '#7C3AED',
                'sort_order' => 2,
            ],
            [
                'name' => 'Mapro 87',
                'slug' => 'mapro-87',
                'tagline' => 'Professional Event Production',
                'description' => '<p>Mapro 87 (Delapan Production) adalah unit bisnis MAGENTA yang menyediakan layanan produksi event secara teknis.</p>
                <p>Dari panggung hingga booth exhibition, kami menghadirkan solusi produksi event yang profesional.</p>',
                'services_list' => "Stage Design & Production\nBooth Exhibition\nBackdrop & Dekorasi\nSound System & Lighting\nLED Display\nTechnical Support",
                'instagram' => 'delapanproduction_id',
                'color' => '#DC2626',
                'sort_order' => 3,
            ],
            [
                'name' => 'Gajah Contractor',
                'slug' => 'gajah-contractor',
                'tagline' => 'Building Dreams Into Reality',
                'description' => '<p>Gajah Contractor adalah unit bisnis MAGENTA yang bergerak di bidang konstruksi interior, arsitektur, dan sipil.</p>
                <p>Dengan pengalaman dan keahlian profesional, kami siap mewujudkan proyek konstruksi Anda.</p>',
                'services_list' => "Interior Design\nArchitecture\nCivil Construction\nRenovation\nFurniture Custom\nLandscape",
                'instagram' => 'gajahartcontractor',
                'color' => '#059669',
                'sort_order' => 4,
            ],
        ];

        foreach ($units as $unit) {
            BusinessUnit::create($unit);
        }

        // Create About Page
        Page::create([
            'title' => 'Tentang MAGENTA',
            'slug' => 'about',
            'content' => '<h2>Sejarah Perusahaan</h2>
            <p>PT Magenta Jaya Makmur didirikan dengan visi menjadi mitra strategis terdepan dalam industri event dan creative solutions di Indonesia. Berawal dari layanan event organizer, MAGENTA terus berkembang dan kini memiliki empat unit bisnis yang saling terintegrasi.</p>
            
            <h2>Visi</h2>
            <p>Menjadi pemimpin industri event dan creative solutions dengan standar internasional yang mengutamakan kualitas, inovasi, dan kepuasan klien.</p>
            
            <h2>Misi</h2>
            <ul>
                <li>Memberikan layanan terintegrasi berkualitas tinggi</li>
                <li>Mengembangkan SDM profesional dan berkompetensi</li>
                <li>Membangun kemitraan strategis yang berkelanjutan</li>
                <li>Menerapkan praktik bisnis yang etis dan bertanggung jawab</li>
            </ul>',
            'meta_title' => 'Tentang Kami - MAGENTA',
            'meta_description' => 'MAGENTA adalah mitra strategis terdepan untuk solusi event, training, media production, dan konstruksi di Indonesia.',
        ]);

        // Create Community Partners
        $partners = [
            ['name' => 'Backstagers Indonesia', 'type' => 'community', 'sort_order' => 1],
            ['name' => 'Ivendo Jateng', 'type' => 'community', 'sort_order' => 2],
            ['name' => 'Event Owners', 'type' => 'community', 'sort_order' => 3],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }

        // Create Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'MAGENTA', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Corporate Event & Creative Solutions', 'group' => 'general'],
            ['key' => 'company_name', 'value' => 'PT Magenta Jaya Makmur', 'group' => 'general'],
            ['key' => 'address', 'value' => 'Semarang, Jawa Tengah, Indonesia', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '0818218787', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'magentajayamakmur@gmail.com', 'group' => 'contact'],
            ['key' => 'instagram', 'value' => 'magenta8787', 'group' => 'social'],
            ['key' => 'whatsapp', 'value' => '6281821878787', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
