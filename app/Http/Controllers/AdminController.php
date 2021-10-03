<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use App\Models\Pengajuan_inventaris;
use App\Models\Penghapusan_inventaris;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function dataUser()
    {
        $user = User::with('roles')->whereHas('roles', function ($query) {
        return $query->where('name','!=', 'admin');})->get();

//        dd($user);
        return view('admin.data-user.admin-data-user', compact('user'));
    }

    public function tambahDataUser()
    {
        return view('admin.data-user.admin-tambah-data-user');
    }

    public function prosTambahUser(Request $request)
    {
        $request->validate([
            'user_id'           =>      'required|int|digits:10',
            'name'              =>      'required|string',
            'jabatan'           =>      'required|string',
            'unit_kerja'        =>      'required|string',
            'password'          =>      'required|alpha_num|min:6',
        ]);

//        dd($request->all())

        $user = User::create([
            'user_id' => $request['user_id'],
            'name' => ucwords($request['name']),
            'jabatan' => $request['jabatan'],
            'unit_kerja' => ucwords($request['unit_kerja']),
            'password' => bcrypt($request['password'])
        ]);

        $user->assignRole($request['jabatan']);

        if(!is_null($user)) {
            return redirect()->route('admin.tambahDataUser')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }
    }

    /*
     *
     * Rekap Laporan Prodi
     *
     */

    public function rekapLaporanProdi()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Prodi'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-laporan.admin-rekap-laporan-prodi', compact('daftar'));
    }

    public function detailRekapLaporanProdi($id)
    {
        $data = Daftar_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-laporan.detail.detail-prodi', compact('data'));
    }

    public function rekapLaporanFakultas()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Fakultas'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-laporan.admin-rekap-laporan-fakultas', compact('daftar'));
    }

    public function detailRekapLaporanFakultas($id)
    {
        $data = Daftar_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-laporan.detail.detail-fakultas', compact('data'));
    }

    public function rekapLaporanBiro()
    {
        $daftar = Daftar_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Biro'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-laporan.admin-rekap-laporan-biro', compact('daftar'));
    }

    public function detailRekapLaporanBiro($id)
    {
        $data = Daftar_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-laporan.detail.detail-biro', compact('data'));
    }


    /*
     *
     Rekap pengajuan
     *
     */

    public function rekapPengajuanProdi()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Prodi'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-pengajuan.admin-rekap-pengajuan-prodi', compact('daftar'));
    }

    public function detailRekapPengajuanProdi($id)
    {
        $data = Pengajuan_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-pengajuan.detail.detail-prodi', compact('data'));
    }

    public function rekapPengajuanFakultas()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Fakultas'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-pengajuan.admin-rekap-pengajuan-fakultas', compact('daftar'));
    }

    public function detailRekapPengajuanFakultas($id)
    {
        $data = Pengajuan_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-pengajuan.detail.detail-fakultas', compact('data'));
    }

    public function rekapPengajuanBiro()
    {
        $daftar = Pengajuan_inventaris::orderBy('unit_kerja', 'asc')->where('unit_kerja', 'LIKE', 'Biro'.'%')->get();
//        dd($daftar);

        return view('admin.rekap-pengajuan.admin-rekap-pengajuan-biro', compact('daftar'));
    }

    public function detailRekapPengajuanBiro($id)
    {
        $data = Pengajuan_inventaris::where('id', '=', $id)->get();
//        dd($data);

        return view('admin.rekap-pengajuan.detail.detail-biro', compact('data'));
    }

    /*
     *
     * Rekap Penghapusan
     *
     */

    public function rekapPenghapusanProdi()
    {

        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja',  'LIKE', 'Prodi'.'%')
            ->select('daftar_inventaris.nama_inventaris','penghapusan_inventaris.jumlah_hapus', 'daftar_inventaris.satuan', 'daftar_inventaris.tahun', 'penghapusan_inventaris.keterangan')
            ->get();
//        dd($daftar);
        return view('admin.rekap-penghapusan.admin-rekap-penghapusan-prodi', compact('daftar'));
    }

    public function rekapPenghapusanFakultas()
    {

        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja',  'LIKE', 'Fakultas'.'%')
            ->select('daftar_inventaris.nama_inventaris','penghapusan_inventaris.jumlah_hapus', 'daftar_inventaris.satuan', 'daftar_inventaris.tahun', 'penghapusan_inventaris.keterangan')
            ->get();
//        dd($daftar);
        return view('admin.rekap-penghapusan.admin-rekap-penghapusan-fakultas', compact('daftar'));
    }

    public function rekapPenghapusanBiro()
    {

        $daftar = DB::table('penghapusan_inventaris')
            ->join('daftar_inventaris', 'penghapusan_inventaris.id_daftar_inventaris', '=', 'daftar_inventaris.id')
            ->where('daftar_inventaris.unit_kerja',  'LIKE', 'Biro'.'%')
            ->select('daftar_inventaris.nama_inventaris','penghapusan_inventaris.jumlah_hapus', 'daftar_inventaris.satuan', 'daftar_inventaris.tahun', 'penghapusan_inventaris.keterangan')
            ->get();
//        dd($daftar);
        return view('admin.rekap-penghapusan.admin-rekap-penghapusan-biro', compact('daftar'));
    }


}
