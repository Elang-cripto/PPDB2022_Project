<?php

namespace App\Http\Controllers;

use App\Imports\InstansiImport;
use App\Models\Appsetting;
use App\Models\User;
use App\Models\Datasiswa;
use App\Models\Asalsekolah;
use App\Models\Postland;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index()
    {
        $db_aktif = Datasiswa::all()->count();
        $db_residu = Datasiswa::where('status', 'RESIDU')->count();
        $db_valid = Datasiswa::where('status', 'VALID')->count();
        $db_invalid = Datasiswa::where('status', 'INVALID')->count();

        return view('admin.dashboard', [
            'db_aktif' => $db_aktif,
            'db_residu' => $db_residu,
            'db_valid' => $db_valid,
            'db_invalid' => $db_invalid,
            'lokasi' => 'dashboard',
            'header' => 'Dashboard | PPDB Online',
        ]);
    }

    public function jumlah()
    {
        return view('admin.jumlah', [
            'header' => 'Jumlah Data | PPDB Online',
            'lokasi' => 'jumlah'
        ]);
    }

    public function formulir()
    {
        return view('admin.formulir', [
            'header' => 'Formulir | PPDB Online',
            'lokasi' => 'formulir',
            'data'   => Asalsekolah::all(),
        ]);
    }

    public function store_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|unique:datasiswas,nisn',
            'nik' => 'required|unique:datasiswas,nik',
        ]);

        if ($validator->fails()) {
            Alert::error('Waduh', 'Data baru GAGAL ditambahkan');
            $validator->validated();
            return back();
        }

        $data = Datasiswa::create([
            'no_reg' => 'REG-' . date('Ymdhis'),
            'creator' => Auth::user()->name,
        ] + $request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('vendor/foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        Alert::success('Alhamdulillah', 'Data baru berhasil ditambahkan');
        return redirect('/admin/residu');
    }

    public function residu()
    {
        return view('admin.data', [
            'header' => 'Data Residu | PPDB Online',
            'lokasi' => 'residu',
            'data' => Datasiswa::where('status', '=', 'RESIDU')->get(),
        ]);
    }

    public function valid()
    {
        return view('admin.data', [
            'header' => 'Data Valid | PPDB Online',
            'lokasi' => 'valid',
            'data' => Datasiswa::where('status', '=', 'VALID')->get(),
        ]);
    }

    public function invalid()
    {
        return view('admin.data', [
            'header' => 'Data Invalid | PPDB Online',
            'lokasi' => 'invalid',
            'data' => Datasiswa::where('status', '=', 'INVALID')->get(),
        ]);
    }

    public function manage()
    {
        return view('admin.manage', [
            'header' => 'Managemen User | PPDB Online',
            'lokasi' => 'manage',
            'data' => User::all(),
        ]);
    }

    public function tambah_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Username sudah terdaftar');
            $validator->validated();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        Alert::success('Alhamdulillah', 'Pengguna baru berhasil ditambahkan');
        return redirect('/admin/manage');
    }

    public function update_user(Request $request, $id)
    {
        $data = User::Find($id);
        $pass = (empty($request->password_new)) ? $request->password_old : bcrypt($request->password_new);
        $data->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $pass,
            'role' => $request->role,
            'status' => $request->status,
            'remember_token' => Str::random(60),
        ]);

        Alert::success('Alhamdulillah', 'Pengguna baru berhasil Update');
        return redirect('/admin/manage');
    }

    public function del_user($id)
    {
        $data = User::Find(Crypt::decryptString($id));
        $data->delete();

        Alert::warning('Alhamdulillah', 'Data berhasil dihapus');
        return back();
    }

    public function instansi()
    {
        return view('admin.instansi', [
            'header' => 'Sekolah Asal | PPDB Online',
            'lokasi' => 'instansi',
            'data' => Asalsekolah::all(),
        ]);
    }

    public function add_instansi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'npsn' => 'required|unique:asalsekolahs,npsn',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'NPSN sudah terdaftar');
            $validator->validated();
        }

        Asalsekolah::create($request->all());
        Alert::success('Alhamdulillah', 'Pengguna baru berhasil ditambahkan');
        return back();
    }

    public function upd_instansi(Request $request, $id)
    {
        $data = Asalsekolah::Find($id);
        $data->update($request->all());

        Alert::success('Alhamdulillah', 'Pengguna baru berhasil Update');
        return back();
    }

    public function import_instansi(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move("ExcelImport", $namafile);
        Excel::import(new InstansiImport, \public_path('/ExcelImport/' . $namafile));

        Alert::success('Alhamdulillah', 'Data berhasil ditambahkan');
        return redirect()->back();
    }

    public function del_instansi($id)
    {
        $data = Asalsekolah::Find(Crypt::decryptString($id));
        $data->delete();

        Alert::warning('Alhamdulillah', 'Data berhasil dihapus');
        return back();
    }

    public function setting()
    {
        return view('admin/setting', [
            'header' => 'Setting | PPDB Online',
            'lokasi' => 'setting',
        ]);
    }

    public function upd_setting(Request $request, $id)
    {
        $data = Appsetting::Find($id);
        $data->update($request->all());

        Alert::success('Alhamdulillah', 'Update data aplikasi berhasil');
        return back();
    }

    public function posting()
    {
        return view('admin/post', [
            'header' => 'Landing Post | PPDB Online',
            'lokasi' => 'posting',
            'data' => Postland::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin/edit', [
            'header' => 'Edit Data | PPDB Online',
            'lokasi' => 'formulir',
            'data' => Datasiswa::Find(Crypt::decryptString($id)),
            'cari' => Asalsekolah::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Datasiswa::Find($id);
        $data->update($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('vendor/foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        Alert::success('Alhamdulillah', 'Update data berhasil');
        return back();
    }

    public function delete($id)
    {
        $data = Datasiswa::Find(Crypt::decryptString($id));
        $data->delete();

        Alert::warning('Alhamdulillah', 'Data berhasil dihapus');
        return back();
    }
}
