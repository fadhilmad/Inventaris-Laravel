<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function dataUser()
    {
        return view('admin.admin-data-user');
    }
}
