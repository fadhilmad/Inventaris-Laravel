<?php

namespace Database\Seeders;

use App\Models\Daftar_inventaris;
use Illuminate\Database\Seeder;

class daftarInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = Daftar_inventaris::create([
            'unit_kerja' => 'Prodi Sistem Informasi',
            'nama_inventaris' => 'LCD',
            'jumlah_inventaris' => '1',
            'satuan' => 'buah',
            'tahun' => '2021',
            'keterangan_inventaris' => 'test',
        ]);

        $a2 = Daftar_inventaris::create([
            'unit_kerja' => 'Fakultas Teknik',
            'nama_inventaris' => 'LCD',
            'jumlah_inventaris' => '3',
            'satuan' => 'buah',
            'tahun' => '2021',
            'keterangan_inventaris' => 'test2',
        ]);
    }
}
