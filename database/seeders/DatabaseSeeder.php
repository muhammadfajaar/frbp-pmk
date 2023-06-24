<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\User;
use App\Models\Category;
use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Gallery;
use App\Models\GalleryCategory;
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
         'email' => 'admin@gmail.com',
         'password' => bcrypt('password')
      ]);
      User::create([
         'name' => 'Author',
         'username' => 'author',
         'email' => 'author@gmail.com',
         'password' => bcrypt('password')
      ]);

      User::factory(3)->create();

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

      Post::factory(30)->create();

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

      Disaster::create([
         'disaster_category_id' => 1,
         'subdistrict_id' => 1,
         'penyebab' => 'Kebocoran Tabung Gas',
         'slug' => 'kebocoran-tabung-gas',
         'hilang' => 5,
         'meninggal_dunia' => 0,
         'mengungsi' => 10,
         'luka_luka' => 3,
         'rumah_rusak_ringan' => 9,
         'rumah_rusak_sedang' => 12,
         'rumah_rusak_berat' => 3,
         'rumah_terendam' => 3,
         'fas_pendidikan' => 2,
         'fas_ibadah' => 1,
         'fas_kesehatan' => 0,
         'fas_umum' => 3,
         'location' => 'Ds.Badung, Kab.Pamekasan, Ds.Banyubulu, Kab.Pamekasan, Ds.Batokalangan, Kab.Pamekasan',
         'waktu' => '12-06-2023'
      ]);
      Disaster::create([
         'disaster_category_id' => 1,
         'subdistrict_id' => 1,
         'penyebab' => 'Cuaca Sangat Panas',
         'slug' => 'cuaca-sangat-panas',
         'hilang' => 5,
         'meninggal_dunia' => 0,
         'mengungsi' => 10,
         'luka_luka' => 3,
         'rumah_rusak_ringan' => 9,
         'rumah_rusak_sedang' => 12,
         'rumah_rusak_berat' => 3,
         'rumah_terendam' => 3,
         'fas_pendidikan' => 2,
         'fas_ibadah' => 1,
         'fas_kesehatan' => 0,
         'fas_umum' => 3,
         'location' => 'Ds. Proppo, Kab.Pamekasan',
         'waktu' => '11-06-2023'
      ]);
      Disaster::create([
         'disaster_category_id' => 2,
         'subdistrict_id' => 2,
         'penyebab' => 'Hujan Selama Seminggu',
         'slug' => 'hujan-selama-seminggu',
         'hilang' => 5,
         'meninggal_dunia' => 0,
         'mengungsi' => 10,
         'luka_luka' => 3,
         'rumah_rusak_ringan' => 9,
         'rumah_rusak_sedang' => 12,
         'rumah_rusak_berat' => 3,
         'rumah_terendam' => 3,
         'fas_pendidikan' => 2,
         'fas_ibadah' => 1,
         'fas_kesehatan' => 0,
         'fas_umum' => 3,
         'location' => 'Ds.Panempan, Kab.Pamekasan',
         'waktu' => '19-06-2023'
      ]);
      Disaster::create([
         'disaster_category_id' => 3,
         'subdistrict_id' => 3,
         'penyebab' => 'Karena Hujan',
         'slug' => 'karena-hujan',
         'hilang' => 5,
         'meninggal_dunia' => 0,
         'mengungsi' => 10,
         'luka_luka' => 3,
         'rumah_rusak_ringan' => 9,
         'rumah_rusak_sedang' => 12,
         'rumah_rusak_berat' => 3,
         'rumah_terendam' => 3,
         'fas_pendidikan' => 2,
         'fas_ibadah' => 1,
         'fas_kesehatan' => 0,
         'fas_umum' => 3,
         'location' => 'Ds. Larangan Tokol, Kab.Pamekasan',
         'waktu' => '20-06-2023'
      ]);

      Agenda::create([
         'user_id' => 1,
         'date' => '23-06-2023',
         'start_time' => '08:00',
         'end_time' => '09:00',
         'activity' => 'Acara Launcing Website FRPB   ',
         'slug' => 'acara-launcing-website-frpb',
         'location' => 'Base Camp FRPB',
         'deskription' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae quod ratione architecto laudantium optio quaerat molestias facere necessitatibus deserunt at doloribus ab consequatur veritatis nemo repellat nostrum in, officia deleniti. Laboriosam adipisci, suscipit dolores odit perspiciatis delectus voluptatum illum, iusto sapiente optio voluptate mollitia asperiores? Est veritatis cum non officiis.'
      ]);
      Agenda::create([
         'user_id' => 2,
         'date' => '24-06-2023',
         'start_time' => '10:00',
         'end_time' => '11:00',
         'activity' => 'Pelatihan Anggota Baru',
         'slug' => 'pelatihan-anggota-baru',
         'location' => 'Kantor',
         'deskription' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus aliquid laboriosam nihil error perspiciatis voluptates ipsam asperiores ullam magnam ea nemo consequuntur tempora quo sapiente, quam impedit, ad molestias corporis?'
      ]);
      Agenda::create([
         'user_id' => 3,
         'date' => '25-06-2023',
         'start_time' => '07:00',
         'end_time' => '08:00',
         'activity' => 'Pelatihan Peningkatan Kerja',
         'slug' => 'pelatihan-peningkatan-kerja',
         'location' => 'Base Camp FRPB',
         'deskription' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam voluptatibus voluptatum quos, ex quis consequuntur!'
      ]);
      Agenda::create([
         'user_id' => 1,
         'date' => '21-06-2023',
         'start_time' => '06:00',
         'end_time' => '07:00',
         'activity' => 'Rapat Bersama Mahasiswa',
         'slug' => 'rapat-bersama-mahasiswa',
         'location' => 'Monumen Arek Lancor',
         'deskription' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt, aspernatur eligendi eveniet sapiente omnis dolorem eos quae, reprehenderit et deleniti in ratione porro nam aut sit quam fugit voluptas distinctio cupiditate quos, explicabo nemo aliquid. Voluptatem, fuga voluptas? Esse cum perferendis tenetur cupiditate neque corporis?'
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

      Gallery::create([
         'user_id' => 1,
         'gallery_category_id' => 1,
         'description' => 'Pembagian Masker Gratis',
         'slug' => 'pembagian-masker-gratis'
      ]);
      Gallery::create([
         'user_id' => 2,
         'gallery_category_id' => 2,
         'description' => 'Pencarian Korban Tenggelam di Laut',
         'slug' => 'pencarian-korban-tenggelam-di-laut'
      ]);
      Gallery::create([
         'user_id' => 3,
         'gallery_category_id' => 3,
         'description' => 'Rapat Rutin FRPB',
         'slug' => 'rapat-rutin-frpb',
      ]);
      Gallery::create([
         'user_id' => 4,
         'gallery_category_id' => 4,
         'description' => 'Membersihkan Sampah di Sungai',
         'slug' => 'membersihkan-sampah-di-sungai',
      ]);
   }
}
