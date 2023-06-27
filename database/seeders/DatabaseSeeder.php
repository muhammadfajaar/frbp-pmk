<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Post;
use App\Models\Subdistrict;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {

      User::create([
         'name' => 'Admin',
         'username' => 'admin',
         'is_admin' => 1,
         'email' => 'admin@gmail.com',
         'password' => bcrypt('password')
      ]);
      User::create([
         'name' => 'Author',
         'username' => 'author',
         'email' => 'author@gmail.com',
         'password' => bcrypt('password')
      ]);

      
      Category::create([
         'name' => 'Web Programming',
         'slug' => 'web-programming'
      ]);
      Category::create([
         'name' => 'Web Design',
         'slug' => 'web-design'
      ]);
      Category::create([
         'name' => 'Personal',
         'slug' => 'personal'
      ]);
      
      User::factory(3)->create();
      
      Post::factory(40)->create();

      Agenda::factory(20)->create();

      Disaster::factory(20)->create();

      Gallery::factory(40)->create();

      Member::factory(30)->create();

      Contact::factory(35)->create();
      

      Organization::create([
         'name' => 'forum relawan penanggulangan bencana pamekasan',
         'slug' => 'forum-relawan-penanggulangan-bencana-pamekasan',
         'short_name' => 'frpb',
         'chairman_name' => 'pak budi',
         'email' => 'frpb@gmail.com',
         'notelp' => '08323232323',
         'address' => 'pamekasan',
         'maps_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7917.533677716464!2d113.47008928656577!3d-7.152935357100164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sfrpb%20pamekasan!5e0!3m2!1sen!2sid!4v1686927333412!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
      ]);

      DisasterCategory::create([
         'name' => 'Kebakaran',
         'slug' => 'kebakaran'
      ]);
      DisasterCategory::create([
         'name' => 'Banjir',
         'slug' => 'banjir'
      ]);
      DisasterCategory::create([
         'name' => 'Tanah Longsor',
         'slug' => 'tanah-longsor'
      ]);
      DisasterCategory::create([
         'name' => 'Cuaca Ekstrem',
         'slug' => 'cuaca-ekstrem'
      ]);
      DisasterCategory::create([
         'name' => 'Kahutla',
         'slug' => 'karhutla'
      ]);
      DisasterCategory::create([
         'name' => 'Gempabumi',
         'slug' => 'gempabumi'
      ]);
      DisasterCategory::create([
         'name' => 'Gelombang Pasang dan Abrasi',
         'slug' => 'gelombang-pasang-dan-abrasi'
      ]);
      DisasterCategory::create([
         'name' => 'Kekeringan',
         'slug' => 'kekerigan'
      ]);
      DisasterCategory::create([
         'name' => 'Erupsi Guniung Api',
         'slug' => 'erupsi-gunung-api'
      ]);

      Subdistrict::create([
         'name' => 'Batu Marmar',
         'slug' => 'batu-marmar'
      ]);
      Subdistrict::create([
         'name' => 'Galis',
         'slug' => 'galis'
      ]);
      Subdistrict::create([
         'name' => 'Kadur',
         'slug' => 'kadur'
      ]);
      Subdistrict::create([
         'name' => 'Larangan',
         'slug' => 'larangan'
      ]);
      Subdistrict::create([
         'name' => 'Pademawu',
         'slug' => 'pademawu'
      ]);
      Subdistrict::create([
         'name' => 'Pakong',
         'slug' => 'pakong'
      ]);
      Subdistrict::create([
         'name' => 'Pasean',
         'slug' => 'pasean'
      ]);
      Subdistrict::create([
         'name' => 'Palenggaan',
         'slug' => 'palenggaan'
      ]);
      Subdistrict::create([
         'name' => 'Pamekasan',
         'slug' => 'pamekasan'
      ]);
      Subdistrict::create([
         'name' => 'Pagentenan',
         'slug' => 'pagentenan'
      ]);
      Subdistrict::create([
         'name' => 'Proppo',
         'slug' => 'proppo'
      ]);
      Subdistrict::create([
         'name' => 'Tlanakan',
         'slug' => 'tlanakan'
      ]);
      Subdistrict::create([
         'name' => 'Waru',
         'slug' => 'waru'
      ]);

      Profile::create([
         'name' => 'Struktur Organisasi',
         'slug' => 'struktur-organisasi',
         'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis rem qui, provident quasi, nihil, veniam tempore nam ex ducimus at doloremque magni odio. Et quaerat sapiente voluptatum debitis nisi repellendus veniam unde tempora nesciunt ipsa, enim in officiis rem quas at? Consectetur ipsa velit quia fugit deserunt officia earum quibusdam explicabo quo, animi, sit dignissimos voluptatem iusto, facilis similique reprehenderit nemo modi perferendis fugiat. Quam, quod necessitatibus. Facere eos delectus corporis ratione magnam fugit officiis dolorum! Quaerat quasi explicabo rem autem alias doloribus deserunt in officiis, repellat aut necessitatibus. Voluptates, reiciendis. Ratione nemo itaque a delectus et cumque nobis repellendus.'
      ]);
      Profile::create([
         'name' => 'Visi Misi',
         'slug' => 'visi-misi',
         'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis rem qui, provident quasi, nihil, veniam tempore nam ex ducimus at doloremque magni odio. Et quaerat sapiente voluptatum debitis nisi repellendus veniam unde tempora nesciunt ipsa, enim in officiis rem quas at? Consectetur ipsa velit quia fugit deserunt officia earum quibusdam explicabo quo, animi, sit dignissimos voluptatem iusto, facilis similique reprehenderit nemo modi perferendis fugiat. Quam, quod necessitatibus.'
      ]);
      Profile::create([
         'name' => 'Sejarah Organisasi',
         'slug' => 'sejarah-organisasi',
         'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis rem qui, provident quasi, nihil, veniam tempore nam ex ducimus at doloremque magni odio. Et quaerat sapiente voluptatum debitis nisi repellendus veniam unde tempora nesciunt ipsa, enim in officiis rem quas at? Consectetur ipsa velit quia fugit deserunt officia earum quibusdam explicabo quo, animi, sit dignissimos voluptatem iusto, facilis similique reprehenderit nemo modi perferendis fugiat. Quam, quod necessitatibus. Facere eos delectus corporis ratione magnam fugit officiis dolorum! Quaerat quasi explicabo rem autem alias doloribus deserunt in officiis, repellat aut necessitatibus. Voluptates, reiciendis. Ratione nemo itaque a delectus et cumque nobis repellendus.Et quaerat sapiente voluptatum debitis nisi repellendus veniam unde tempora nesciunt ipsa, enim in officiis rem quas at? Consectetur ipsa velit quia fugit deserunt officia earum quibusdam explicabo quo, animi, sit dignissimos voluptatem iusto, facilis similique reprehenderit nemo modi perferendis fugiat.'
      ]);

      GalleryCategory::create([
         'name' => 'Sosialisi',
         'slug' => 'sosialisasi'
      ]);
      GalleryCategory::create([
         'name' => 'Bencana Alam',
         'slug' => 'bencana-alam'
      ]);
      GalleryCategory::create([
         'name' => 'Base Camp',
         'slug' => 'base-camp'
      ]);
      GalleryCategory::create([
         'name' => 'Kegiatan Rutin',
         'slug' => 'kegiatan-rutin'
      ]);

   }
}
