<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use App\Models\Pengajuan_inventaris;
use App\Models\Penghapusan_inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class WrController extends Controller
{

    public function index()
    {
        return view('wr.wr-dashboard');
    }

    /*
     *
     * prodi
     */

    public function LaporanProdi()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Prodi'.'%')->get();
//        dd($daftar);

        return view('wr.laporan.laporan-prodi', compact('daftar'));
    }

    public function detailLaporanProdi($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('wr.laporan.detail.detail-laporan-prodi', compact('data'));
    }

    /*
     *
     * fakultas
     */

    public function LaporanFakultas()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Fakultas'.'%')->get();
//        dd($daftar);

        return view('wr.laporan.laporan-fakultas', compact('daftar'));
    }

    public function detailLaporanFakultas($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('wr.laporan.detail.detail-laporan-fakultas', compact('data'));
    }

    /*
     *
     * biro
     */

    public function LaporanBiro()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Biro'.'%')->get();
//        dd($daftar);

        return view('wr.laporan.laporan-biro', compact('daftar'));
    }

    public function detailLaporanBiro($id)
    {
        $data = Daftar_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('wr.laporan.detail.detail-laporan-biro', compact('data'));
    }


    /*
     *
     * pengajuan
     *
     */

    public function pengajuanProdi()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Prodi'.'%')->get();
//        dd($daftar);

        return view('wr.pengajuan.pengajuan-prodi', compact('daftar'));
    }

    public function detailPengajuanProdi($id)
    {
        $data = Pengajuan_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('wr.pengajuan.detail.detail-pengajuan-prodi', compact('data'));
    }

    public function pengajuanFakultas()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Fakultas'.'%')->get();
//        dd($daftar);

        return view('wr.pengajuan.pengajuan-fakultas', compact('daftar'));
    }

    public function detailPengajuanFakultas($id)
    {
        $data = Pengajuan_inventaris::where('unit_kerja', '=', $id)->get();
//        dd($data);

        return view('wr.pengajuan.detail.detail-pengajuan-fakultas', compact('data'));
    }

    public function pengajuanBiro()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')
            ->groupBy('unit_kerja')
            ->where('unit_kerja', 'LIKE', 'Biro'.'%')
            ->orWhere('unit_kerja', 'LIKE', 'Unit'.'%')
            ->get();
//        dd($daftar);

        return view('wr.pengajuan.pengajuan-biro', compact('daftar'));
    }

    public function detailPengajuanBiro($id)
    {
        $data = Pengajuan_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('wr.pengajuan.detail.detail-pengajuan-biro', compact('data'));
    }


    public function changeStatus(Request $request)
    {
        $data = Pengajuan_inventaris::find($request->id);
        $request->validate([ 'validasi_wr' => 'required|integer' ]);
        $data->validasi_wr = $request->validasi_wr;
        $data->save();

        if(!$data){
            App::abort(500, 'Error');
        }
        else{
            return response()->json(['success'=>'Berhasil Diubah']);
        }
    }

    /*
     *
     * Penghapusan
     *
     */

    public function penghapusanProdi()
    {
        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Prodi'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('wr.penghapusan.penghapusan-prodi', compact('daftar'));
    }

    public function detailPenghapusanProdi($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('wr.penghapusan.detail.detail-penghapusan-prodi', compact('data'));
    }

    public function penghapusanFakultas()
    {
        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Fakultas'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('wr.penghapusan.penghapusan-fakultas', compact('daftar'));
    }

    public function detailPenghapusanFakultas($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('wr.penghapusan.detail.detail-penghapusan-fakultas', compact('data'));
    }

    public function penghapusanBiro()
    {
        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja', 'LIKE', 'Biro'.'%')
            ->orWhere('daftar_inventaris.unit_kerja', 'LIKE', 'Unit'.'%')
            ->groupBy('daftar_inventaris.unit_kerja')
            ->select('penghapusan_inventaris.id','daftar_inventaris.unit_kerja')
            ->get();

//        dd($daftar);

        return view('wr.penghapusan.penghapusan-biro', compact('daftar'));
    }

    public function detailPenghapusanBiro($id)
    {

//        dd($id);
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $id)
            ->select('daftar_inventaris.unit_kerja','daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('wr.penghapusan.detail.detail-penghapusan-biro', compact('data'));
    }

    public function changeStatusPenghapusan(Request $request)
    {
        $check = Penghapusan_inventaris::where('id', '=', $request->id)->first();

        if ($check->validasi_ketua == 1){

            $data = Penghapusan_inventaris::find($request->id);
            $data->validasi_wr = $request->validasi_wr;
            $data->save();

            $update = Daftar_inventaris::where('id', '=', $check->id_daftar_inventaris)->update(['jumlah_inventaris' => $request->jumlah_setelah]);

            if(!$update){
                App::abort(500, 'Error');
            }
            else{
                return response()->json(['success'=>'Berhasil Diubah']);
            }
        }
        else{
            $data = Penghapusan_inventaris::find($request->id);
            $data->validasi_wr = $request->validasi_wr;
            $data->save();

            if(!$data){
                App::abort(500, 'Error');
            }
            else{
                return response()->json(['success'=>'Berhasil Diubah']);
            }
        }

    }

}
