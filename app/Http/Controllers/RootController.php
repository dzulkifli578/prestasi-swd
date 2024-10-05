<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function Beranda()
    {
        return view("beranda");
    }

    public function Prestasi()
    {
        return view("prestasi");
    }

    public function Login()
    {
        return view("login");
    }
}
