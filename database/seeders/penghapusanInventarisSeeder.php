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
        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '1',
            'jumlah_hapus' => '1',
            'keterangan' => 'Baik',
        ]);

        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '1',
            'jumlah_hapus' => '3',
            'keterangan' => 'Buruk',
        ]);

        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '2',
            'jumlah_hapus' => '5',
            'keterangan' => 'Baik',
        ]);

        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '2',
            'jumlah_hapus' => '13',
            'keterangan' => 'Buruk',
        ]);

        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '3',
            'jumlah_hapus' => '22',
            'keterangan' => 'Baik',
        ]);

        Penghapusan_inventaris::create([
            'id_daftar_inventaris' => '3',
            'jumlah_hapus' => '30',
            'keterangan' => 'Buruk',
        ]);
    }
}
