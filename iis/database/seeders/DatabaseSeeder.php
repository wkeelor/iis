<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            ['name' => 'registered_user'],
            ['name' => 'moderator'],
            ['name' => 'administrator']
        ]);

        \App\Models\User::factory()->create([
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'password' => 'password',
            'login' => 'johnsmith',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Emily Johnson',
            'email' => 'emily.johnson@example.com',
            'password' => 'password',
            'login' => 'emilyjohnson',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Daniel Brown',
            'email' => 'daniel.brown@example.com',
            'password' => 'password',
            'login' => 'danielbrown',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Sophia Davis',
            'email' => 'sophia.davis@example.com',
            'password' => 'password',
            'login' => 'sophiadavis',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1
        ]);

        \App\Models\User::factory()->create([
                'name' => 'Moderator',
                'email' => 'moderator@moderator.com',
                'password' => 'password',
                'login' => 'moderator',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2
        ]);

        \App\Models\User::factory()->create([
                'name' => 'Admin admin',
                'email' => 'admin@admin.com',
                'password' => 'password',
                'login' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3
        ]);

        \App\Models\Category::create([
            'name' => 'Entertainment',
            'approved' => true
        ]);

        \App\Models\Category::create([
            'name' => 'Music',
            'parent_id' => 1,
            'approved' => true
        ]);

        \App\Models\Category::create([
            'name' => 'Movies',
            'parent_id' => 1,
            'approved' => true
        ]);

        \App\Models\Category::create([
            'name' => 'Theater',
            'parent_id' => 1,
            'approved' => false
        ]);

        \App\Models\Category::create([
            'name' => 'Educational',
            'approved' => true
        ]);

        \App\Models\Category::create([
            'name' => 'Improvisation',
            'parent_id' => 1
        ]);

        \App\Models\Category::create([
            'name' => 'Formal events'
        ]);

        \App\Models\PriceCategory::create([
            'name' => 'Spoplatnené',

        ]);
        \App\Models\PriceCategory::create([
            'name' => 'Dobrovoľné',

        ]);
        \App\Models\PriceCategory::create([
            'name' => 'Zdarma',

        ]);

        \App\Models\Venue::create([
            'name' => 'Harmony Hall',
            'description' => 'Harmony Hall je prvotriedne miesto pre udalosti, ktoré ponúka dokonalú kombináciu elegancie a pokoja. Naše krásne navrhnuté priestory a bezchybná služba robia každú udalosť nezabudnuteľným zážitkom.',
            'street' => 'Melody Street',
            'street_number' => '25/12',
            'zip_code' => 'HV 56789',
            'province' => 'Harmonyville',
            'country' => 'Countryland',
            'approved' => true,
            'logo' => 'images/venue_1.png'
        ]);
        \App\Models\Venue::create([
            'name' => 'Serene Gardens Venue',
            'description' => 'Objavte pokoje v Serene Gardens Venue, kde príroda stretáva eleganciu. Naše miesto poskytuje pokojné prostredie obklopené bujnými záhradami, čo ho robí ideálnou voľbou pre svadby a špeciálne udalosti.',
            'street' => 'Tranquil Avenue',
            'street_number' => '789',
            'zip_code' => 'CL 98765',
            'province' => 'Calm City',
            'country' => 'Sereneland',
            'logo' => 'images/venue_2.png',
            'approved' => true
        ]);
        \App\Models\Venue::create([
            'name' => 'Majestic Manor',
            'description' => 'Vstúpte do veľkoleposti Majestic Manor, vybraného miesta, ktoré vyžaruje kráľovstvo. Naše veľkolepé priestory a kráľovská atmosféra vytvárajú ideálnu kulisu pre vaše špeciálne udalosti a oslavy.',
            'street' => 'Royal Road',
            'street_number' => '456',
            'zip_code' => 'RT 43210',
            'province' => 'Regal Town',
            'country' => 'Kingdomshire',
            'logo' => 'images/venue_3.png',
            'approved' => true
        ]);

        \App\Models\Venue::create([
            'name' => 'Starlight Events Center',
            'description' => 'Zažite magiu v Starlight Events Center, kde je každá udalosť nebeskou oslavou. Naše miesto ponúka hviezdnu atmosféru s modernými zariadeniami, aby vaše udalosti žiarili.',
            'street' => 'Celestial Boulevard',
            'street_number' => '321',
            'zip_code' => 'GC 12345',
            'province' => 'Galaxy City',
            'country' => 'Universeville',
            'logo' => 'images/venue_4.png',
            'approved' => true
        ]);

        \App\Models\Venue::create([
            'name' => 'Emerald Oasis Pavilion',
            'description' => 'Utečte do bujnej krásy Emerald Oasis Pavilion, oázy obklopenej prírodou. Naše miesto ponúka pokojné prostredie s bujnými záhradami, vytvárajúc oázu pre vaše špeciálne príležitosti.',
            'street' => 'Serenity Lane',
            'street_number' => '567',
            'zip_code' => 'TT 67890',
            'province' => 'Tranquil Town',
            'country' => 'Natureland',
            'logo' => 'images/venue_5.png',
            'approved' => true
        ]);

        \App\Models\Venue::create([
            'name' => 'Crystal Palace Banquet Hall',
            'description' => 'Vstúpte do očarenia Crystal Palace Banquet Hall, kde sa elegancia stretáva so žiarou. Naše miesto je zdobené kryštálovými doplnkami, vytvárajúc žiarivú atmosféru pre vaše glamúrové udalosti.',
            'street' => 'Radiant Street',
            'street_number' => '890',
            'zip_code' => 'SC 54321',
            'province' => 'Sparkle City',
            'country' => 'Glitterland',
            'logo' => 'images/venue_6.png',
            'approved' => true
        ]);

        \App\Models\Venue::create([
            'name' => 'Melody Mansion',
            'description' => 'Melody Mansion is a charming venue that combines classic elegance with modern amenities. Our dedicated team ensures that every event is tailored to perfection.',
            'street' => 'Harmonious Avenue',
            'street_number' => '7/15',
            'zip_code' => 'MM 12345',
            'province' => 'Melodyburg',
            'country' => 'Countryland',
            'logo' => 'images/venue_7.png',
        ]);

        \App\Models\Venue::create([
            'name' => 'Symphony Square',
            'description' => 'Symphony Square offers a sophisticated setting for events, with stunning architecture and a tranquil atmosphere. Your special occasions deserve the best, and we provide just that.',
            'street' => 'Harmonic Street',
            'street_number' => '12',
            'zip_code' => 'SS 67890',
            'province' => 'Symphonyville',
            'country' => 'Countryland',
            'logo' => 'images/venue_8.png',
        ]);

        \App\Models\Venue::create([
            'name' => 'Rhythmic Retreat',
            'description' => 'Rhythmic Retreat is an ideal venue for those seeking a peaceful and picturesque setting for their events. Our dedicated team ensures a seamless and memorable experience.',
            'street' => 'Cadence Lane',
            'street_number' => '3',
            'zip_code' => 'RR 54321',
            'province' => 'Rhythmville',
            'country' => 'Countryland',
            'approved' => false,
            'logo' => 'images/venue_9.png',
        ]);

        DB::table('venue_img')->insert([
            ['venue_id' => 1, 'path' => 'images/venue_12.png'],
            ['venue_id' => 1, 'path' => 'images/venue_11.png'],
            ['venue_id' => 2, 'path' => 'images/venue_10.png'],
            ['venue_id' => 2, 'path' => 'images/venue_9.png'],
            ['venue_id' => 3, 'path' => 'images/venue_8.png'],
            ['venue_id' => 3, 'path' => 'images/venue_7.png'],
            ['venue_id' => 4, 'path' => 'images/venue_6.png'],
            ['venue_id' => 4, 'path' => 'images/venue_5.png'],
            ['venue_id' => 5, 'path' => 'images/venue_4.png'],
            ['venue_id' => 5, 'path' => 'images/venue_3.png'],
            ['venue_id' => 6, 'path' => 'images/venue_2.png'],
            ['venue_id' => 6, 'path' => 'images/venue_1.png'],
            ['venue_id' => 7, 'path' => 'images/venue_3.png'],
            ['venue_id' => 7, 'path' => 'images/venue_6.png'],
            ['venue_id' => 8, 'path' => 'images/venue_7.png'],
            ['venue_id' => 8, 'path' => 'images/venue_12.png'],
            ['venue_id' => 9, 'path' => 'images/venue_11.png'],
            ['venue_id' => 9, 'path' => 'images/venue_8.png'],
        ]);

        \App\Models\Event::create([
            'host_id' => 1,
            'name' => 'Elegantná galanoc',
            'description' => 'Večer plný sofistikovanosti a glamúru. Užite si nezabudnuteľný zážitok na našej elegantnej galanoci.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-12-01 18:30:00',
            'end_time' => '2023-12-01 23:00:00',
            'website' => 'https://www.galanoc.sk',
            'venue_id' => 1,
            'price_category_id' => 1,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_1.png',
            'category_id' => 1
        ]);

        \App\Models\Event::create([
            'host_id' => 2,
            'name' => 'Tech Inovačný Summit',
            'description' => 'Objevte najnovšie trendy a inovácie v oblasti technológií. Zúčastnite sa nášho summitu a prehlbte svoje technologické vedomosti.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-11-15 09:00:00',
            'end_time' => '2023-11-16 17:00:00',
            'website' => 'https://www.techsummit.sk',
            'venue_id' => 3,
            'price_category_id' => 2,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_2.png',
            'category_id' => 5
        ]);

        \App\Models\Event::create([
            'host_id' => 3,
            'name' => 'Kulinársky zážitok: Chuťový festival',
            'description' => 'Pridajte sa k nám na jedinečnom chuťovom festivale, kde budete môcť ochutnať exotické jedlá z celého sveta.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-11-10 19:00:00',
            'end_time' => '2023-11-11 22:30:00',
            'website' => 'https://www.chutovyfestival.sk',
            'venue_id' => 5,
            'price_category_id' => 2,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_3.png',
            'category_id' => 3
        ]);

        \App\Models\Event::create([
            'host_id' => 4,
            'name' => 'Divoká párty pod hviezdami',
            'description' => 'Príďte si zatancovať a užiť si nezabudnuteľnú noc na našej divokej párty pod otvoreným nebom.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-12-05 22:00:00',
            'end_time' => '2023-12-06 04:00:00',
            'website' => 'https://www.divokaparty.sk',
            'venue_id' => 2,
            'price_category_id' => 3,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_4.png',
            'category_id' => 2
        ]);

        \App\Models\Event::create([
            'host_id' => 5,
            'name' => 'Umelci v uliciach',
            'description' => 'Nevšedný kultúrny zážitok na uliciach mesta, kde sa stretávajú umelci rôznych žánrov.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2023-12-20 15:00:00',
            'end_time' => '2023-12-20 20:00:00',
            'website' => 'https://www.umelcivuliciach.sk',
            'venue_id' => 4,
            'price_category_id' => 1,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_5.png',
            'category_id' => 3
        ]);

        \App\Models\Event::create([
            'host_id' => 6,
            'name' => 'Sci-Fi Filmový Festival',
            'description' => 'Pre všetkých fanúšikov sci-fi žánru - zážitok z filmov a aktivít pre všetky vekové kategórie.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2024-01-15 18:30:00',
            'end_time' => '2024-01-16 23:00:00',
            'website' => 'https://www.scififest.sk',
            'venue_id' => 6,
            'price_category_id' => 2,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_6.png',
            'category_id' => 2
        ]);

        \App\Models\Event::create([
            'host_id' => 1,
            'name' => 'Zimný maškrtný karneval',
            'description' => 'Tradičný karneval plný zimných radovánok, maškarných kostýmov a veselých súťaží pre deti i dospelých.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2024-02-08 14:00:00',
            'end_time' => '2024-02-09 20:00:00',
            'website' => 'https://www.zimnykarneval.sk',
            'venue_id' => 3,
            'price_category_id' => 3,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_7.png',
            'category_id' => 5
        ]);

        \App\Models\Event::create([
            'host_id' => 2,
            'name' => 'Divadelná premiéra: Tajomstvo starého divadla',
            'description' => 'Záhadná divadelná hra s tajomným príbehom a nečakanými zvratmi, ktorá vás vtiahne do svojho sveta.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2024-03-12 19:00:00',
            'end_time' => '2024-03-13 22:00:00',
            'website' => 'https://www.divadelnapremiera.sk',
            'venue_id' => 4,
            'price_category_id' => 1,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_8.png',
            'category_id' => 3
        ]);

        \App\Models\Event::create([
            'host_id' => 3,
            'name' => 'Festival svetelných inštalácií',
            'description' => 'Unikátny festival plný fascinujúcich svetelných diel, ktoré oživia mestský priestor.',
            'created_at' => now(),
            'updated_at' => now(),
            'start_time' => '2024-04-05 20:00:00',
            'end_time' => '2024-04-06 23:59:00',
            'website' => 'https://www.svetelneinštalacie.sk',
            'venue_id' => 6,
            'price_category_id' => 2,
            'requested_approval' => true,
            'approved' => true,
            'logo' => 'images/event_9.png',
            'category_id' => 2
        ]);

        \App\Models\PriceType::create([
            'event_id' => 1,
            'price' => 500,
            'name' => 'Základní',
            'default' => 1
        ]);

        \App\Models\PriceType::create([
            'event_id' => 1,
            'price' => 300,
            'name' => 'Student',
        ]);

        \App\Models\PriceType::create([
            'event_id' => 1,
            'price' => 300,
            'name' => 'Senior',
        ]);
    }
}
