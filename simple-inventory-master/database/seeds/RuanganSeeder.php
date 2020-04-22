<?php

use Illuminate\Database\Seeder;
use App\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	Ruangan::create(['jurusan_id' => '1', 'name' => 'Anatomi 205']);

        Ruangan::create(['jurusan_id' => '2', 'name' => 'Laboratorium Bioteknologi 02']);

        Ruangan::create(['jurusan_id' => '3', 'name' => 'RKB 205']);

        Ruangan::create(['jurusan_id' => '4', 'name' => 'RKB 302']);

        Ruangan::create(['jurusan_id' => '5', 'name' => 'Vokasi Pusat 306']);
    }
}
