<?php

namespace App\Http\Controllers;

use App\Models\Daftar_inventaris;
use app\Models\User;
use Illuminate\Http\Request;
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


}
