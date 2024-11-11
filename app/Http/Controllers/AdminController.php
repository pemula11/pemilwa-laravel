<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pilihan;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $total_user = User::all()->count();
        $total_kandidat = Kandidat::all()->count();
        $total_pilihan = Pilihan::all()->count();
        $hmj = Kandidat::where('organisasi', 'HMJ')->count();
        $sema = Kandidat::where('organisasi', 'SEMA')->count();
        $dema = Kandidat::where('organisasi', 'DEMA')->count();
        return view('dashboard.menu.index', [
            'total_user' => $total_user,
            'total_kandidat' => $total_kandidat,
            'total_pilihan' => $total_pilihan,
            'hmj' => $hmj,
            'sema' => $sema,
            'dema' => $dema,
        ]);
    }

    public function loginView()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }
        Alert::error('Error', 'username/password salah');
        return back();
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
