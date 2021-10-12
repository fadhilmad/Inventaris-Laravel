<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use App\Models\Pengajuan_inventaris;
use App\Models\Penghapusan_inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tu.tu-dashboard');
    }

    /*
     *
     * data inventaris
     *
     */

    public function data()
    {
        $unit_kerja = Auth::user()->unit_kerja;

        $data = Daftar_inventaris::where('unit_kerja', '=' , $unit_kerja)->get();

        return view('tu.data.tu-data', compact('data'));
    }
    public function tambahData()
    {
        return view('tu.data.tu-tambah-data');
    }
    public function prosTambahData(Request $request)
    {
        $request->validate([
            'nama_inventaris'                =>      'required|string',
            'jumlah_inventaris'              =>      'required|integer',
            'satuan'                         =>      'required|string',
            'tahun'                          =>      'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'keterangan_inventaris'          =>      'required|string',
        ]);

        $proc = Daftar_inventaris::create([
            'unit_kerja' => ucwords(Auth::user()->unit_kerja),
            'nama_inventaris' => ucwords($request['nama_inventaris']),
            'jumlah_inventaris' => $request['jumlah_inventaris'],
            'satuan' => ucwords($request['satuan']),
            'tahun' => $request['tahun'],
            'keterangan_inventaris' => ucwords($request['keterangan_inventaris'])
        ]);

        if(!is_null($proc)) {
            return redirect()->route('tu.tambahData')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }
    }

    /*
     *
     * Data pengajuan
     *
     */

    public function dataPengajuan()
    {
        $unit_kerja = Auth::user()->unit_kerja;

        $data = Pengajuan_inventaris::where('unit_kerja', '=' , $unit_kerja)->get();

        return view('tu.dataPengajuan.tu-data', compact('data'));
    }
    public function tambahDataPengajuan()
    {
        return view('tu.dataPengajuan.tu-tambah-data');
    }
    public function prosTambahDataPengajuan(Request $request)
    {
        $request->validate([
            'nama_inventaris'                =>      'required|string',
            'jumlah_inventaris'              =>      'required|integer',
            'satuan'                         =>      'required|string',
            'jenis_pengajuan'                =>      'required|string',
        ]);

//        dd($request->all());

        $proc = Pengajuan_inventaris::create([
            'unit_kerja' => ucwords(Auth::user()->unit_kerja),
            'nama_inventaris' => ucwords($request['nama_inventaris']),
            'jumlah_inventaris' => $request['jumlah_inventaris'],
            'satuan' => ucwords($request['satuan']),
            'jenis_pengajuan' => ucwords($request['jenis_pengajuan'])
        ]);

        if(!is_null($proc)) {
            return redirect()->route('tu.tambahDataPengajuan')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }
    }

    /*
     *
     * data penghapusan
     *
     */

    public function dataPenghapusan()
    {

        $unit_kerja = Auth::user()->unit_kerja;

        $data = Daftar_inventaris::where('unit_kerja', '=' , $unit_kerja)->get();

        $dataHapus = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja',  '=', $unit_kerja)
            ->select('daftar_inventaris.nama_inventaris','daftar_inventaris.jumlah_inventaris', 'daftar_inventaris.tahun',
                'penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.validasi_ketua', 'penghapusan_inventaris.validasi_wr',
                'penghapusan_inventaris.created_at'
            )
            ->get();

//        dd($data);

        return view('tu.dataPenghapusan.tu-data', compact('data','dataHapus'));
    }
    public function tambahDataPenghapusan($id)
    {
        $data = Daftar_inventaris::where('id', '=',$id)->first();
//        dd($data);
        return view('tu.dataPenghapusan.tu-tambah-data', compact('data'));
    }

    public function prosTambahDataPenghapusan(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'id'                             =>      'required|string',
            'jumlah_sebelum'                 =>      'required|integer',
            'jumlah_hapus'                   =>      'required|integer',
            'satuan'                         =>      'required|string',
            'jumlah_setelah'                 =>      'required|integer',
            'keterangan'                     =>      'required|string',
        ]);

        $proc = Penghapusan_inventaris::create([
            'id_daftar_inventaris' => $request['id'],
            'jumlah_hapus' => $request['jumlah_hapus'],
            'jumlah_setelah' => $request['jumlah_setelah'],
            'keterangan' => ucwords($request['keterangan']),
            'satuan' => ucwords($request['satuan']),
        ]);

        if(!is_null($proc)) {
            return redirect()->route('tu.dataPenghapusan')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }

    }



}
