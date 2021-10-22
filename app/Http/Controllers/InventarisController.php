<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventaris.inventaris-dashboard');
    }

    public function laporanProdi()
    {
        $data = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Prodi'.'%')->get();
        return view('grup.laporan.laporan-prodi', compact('data'));
    }

    public function detailLaporanProdi($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('grup.laporan.detail.prodi', compact('data'));
    }

    public function laporanFakultas()
    {
        $data = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Fakultas'.'%')->get();
        return view('grup.laporan.laporan-fakultas', compact('data'));
    }

    public function detailLaporanFakultas($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('grup.laporan.detail.fakultas', compact('data'));
    }

    public function laporanBiro()
    {
        $data = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Biro'.'%')
            ->orWhere('unit_kerja', 'LIKE', 'Unit'.'%')
            ->get();
        return view('grup.laporan.laporan-biro', compact('data'));
    }

    public function detailLaporanBiro($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('grup.laporan.detail.biro', compact('data'));
    }

    /*
     *
     * penghapusan
     *
     */

    public function penghapusanProdi()
    {
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Prodi'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('grup.penghapusan.penghapusan-prodi', compact('data'));
    }

    public function detailPenghapusanProdi($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('grup.penghapusan.detail.prodi', compact('data'));
    }

    public function penghapusanFakultas()
    {
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Fakultas'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('grup.penghapusan.penghapusan-fakultas', compact('data'));
    }

    public function detailPenghapusanFakultas($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('grup.penghapusan.detail.fakultas', compact('data'));
    }

    public function penghapusanBiro()
    {
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Biro'.'%')
            ->orWhere('daftar_inventaris.unit_kerja', 'LIKE', 'Unit'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('grup.penghapusan.penghapusan-biro', compact('data'));
    }

    public function detailPenghapusanBiro($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('grup.penghapusan.detail.biro', compact('data'));
    }
}
