<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();

            return view('auth.login');
        } catch (\Exception $e) {
            return redirect('lock');
        }
    }

    public function lock()
    {
        return view('lock');
    }

    public function admin_login()
    {
        return view('admin.login');
    }

    public function do_login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            Alert::success('Selamat Datang', 'Bismillahiroohmanirohim...');
            return redirect('/' . Auth::user()->role);
        }

        Session::put('saya', Auth::user()->name);


        Alert::error('Astagfirullah', 'Salah Maseeehhhh');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
