<?php

use Illuminate\Database\Seeder;
use App\Fakultas;


class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	Fakultas::create(['name_fakultas' => 'KEDOKTERAN']);
          Fakultas::create(['name_fakultas' => 'TEKNOLOGI PERTANIAN']);
          Fakultas::create(['name_fakultas' => 'ILMU BUDAYA']);
          Fakultas::create(['name_fakultas' => 'ILMU SOSIAL DAN POLITIK']);
          Fakultas::create(['name_fakultas' => 'VOKASI']);

    }
}
