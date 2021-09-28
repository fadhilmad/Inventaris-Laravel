<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
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
}
