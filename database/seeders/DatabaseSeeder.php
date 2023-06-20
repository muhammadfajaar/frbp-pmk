<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Disaster;
use App\Models\DisasterCategory;
use App\Models\Organization;
use App\Models\Post;
use App\Models\Subdistrict;
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

      Subdistrict::create([
         'name' => 'Proppo',
         'slug' => 'proppo'
      ]);
      Subdistrict::create([
         'name' => 'Pamekasan',
         'slug' => 'pamekasan'
      ]);
      Subdistrict::create([
         'name' => 'Tlanakan',
         'slug' => 'Tlanakan'
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
         'waktu' => '11s-06-2023'
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
   }
}
