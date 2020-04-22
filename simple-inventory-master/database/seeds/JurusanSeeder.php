<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          	Jurusan::create(['fakultas_id' => '1', 'name_jurusan' => 'PENDIDIKAN DOKTER']);
            Jurusan::create(['fakultas_id' => '2', 'name_jurusan' => 'TEKNOLOGI PANGAN']);
            Jurusan::create(['fakultas_id' => '3', 'name_jurusan' => 'ANTROPOLOGI']);
            Jurusan::create(['fakultas_id' => '4', 'name_jurusan' => 'HUBUNGAN INTERNASIONAL']);
            Jurusan::create(['fakultas_id' => '5', 'name_jurusan' => 'TEKNOLOGI INFORMASI DAN KOMPUTER']);
    }
}
