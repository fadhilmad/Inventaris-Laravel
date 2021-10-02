<?php

namespace Database\Seeders;

use App\Models\Penghapusan_inventaris;
use Illuminate\Database\Seeder;

class penghapusanInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '1',
            'jumlah_hapus' => '1',
            'keterangan' => 'Baik',
        ]);
    }
}
