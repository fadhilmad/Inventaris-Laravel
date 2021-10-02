<?php

namespace Database\Seeders;

use App\Models\Pengajuan_inventaris;
use Illuminate\Database\Seeder;

class pengajuanInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = Pengajuan_inventaris::create([
            'unit_kerja' => 'Prodi Sistem Informasi',
            'nama_inventaris' => 'LCD',
            'jumlah_inventaris' => '1',
            'satuan' => 'buah',
            'jenis_pengajuan' => 'Baru',
        ]);

        $a2 = Pengajuan_inventaris::create([
            'unit_kerja' => 'Fakultas Teknik',
            'nama_inventaris' => 'Monitor',
            'jumlah_inventaris' => '3',
            'satuan' => 'buah',
            'jenis_pengajuan' => 'Baru',
        ]);

        $a3 = Pengajuan_inventaris::create([
            'unit_kerja' => 'Biro Administrasi',
            'nama_inventaris' => 'Layar',
            'jumlah_inventaris' => '10',
            'satuan' => 'buah',
            'jenis_pengajuan' => 'Baru',
        ]);
    }
}
