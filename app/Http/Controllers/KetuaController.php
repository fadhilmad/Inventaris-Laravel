<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use App\Models\Pengajuan_inventaris;
use App\Models\Penghapusan_inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ketua.ketua-dashboard');
    }

    public function laporanInventaris()
    {
        $unit_kerja = Auth::user()->unit_kerja;
//        dd($unit_kerja);
        $data = Daftar_inventaris::where('unit_kerja', '=', $unit_kerja)->get();
//        dd($data);

        return view('ketua.ketua-laporanInventaris', compact('data'));
    }

    public function pengajuanInventaris()
    {
        $unit_kerja = Auth::user()->unit_kerja;
        $data = Pengajuan_inventaris::where('unit_kerja', '=', $unit_kerja)->get();
//        dd($data);

        return view('ketua.ketua-pengajuan-inventaris', compact('data'));
    }

    public function changeStatus(Request $request)
    {
        $data = Pengajuan_inventaris::find($request->id);
        $request->validate([ 'validasi_ketua' => 'required|integer' ]);
        $data->validasi_ketua = $request->validasi_ketua;
        $data->save();

        if(!$data){
            App::abort(500, 'Error');
        }
        else{
            return response()->json(['success'=>'Berhasil Diubah']);
        }
    }

    public function penghapusanInventaris()
    {
        $unit_kerja = Auth::user()->unit_kerja;
        $data = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja','=', $unit_kerja)
            ->select('daftar_inventaris.nama_inventaris','daftar_inventaris.tahun','penghapusan_inventaris.id','penghapusan_inventaris.id_daftar_inventaris','penghapusan_inventaris.jumlah_hapus','penghapusan_inventaris.jumlah_setelah','penghapusan_inventaris.satuan','penghapusan_inventaris.keterangan','penghapusan_inventaris.validasi_ketua','penghapusan_inventaris.validasi_wr')
            ->get();

        return view('ketua.ketua-penghapusan-inventaris',compact('data'));
    }

    public function changeStatusPenghapusan(Request $request)
    {
        $check = Penghapusan_inventaris::where('id', '=', $request->id)->first();

        if ($check->validasi_wr == 1){

            $data = Penghapusan_inventaris::find($request->id);
            $data->validasi_ketua = $request->validasi_ketua;
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
            $data->validasi_ketua = $request->validasi_ketua;
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
