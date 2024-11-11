<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Pilihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserDashboardController extends Controller
{
    //

    public function index(Request $request)
    {
        $pil = 'hmj';
        if ($request->has('pil')) {
            # code...
            $pil = $request->pil;
        }
        # code...
        $user = Auth::user();
        $id_user = $user->id;
        $kandidat = Kandidat::where('organisasi', $pil)->get();
        $statuspil = Kandidat::with('pilihan')->where('organisasi', $pil)->whereHas('pilihan', function($q) use($id_user){
            $q->where('id_user', $id_user);
        })->count();
        return view('user.dashboard', [
            'user' => $user,
            'data_kandidat' => $kandidat,
            'pil' => $pil,
            'status' => $statuspil,
        ]);
    }

    public function profil($id)
    {
        
        # code...
        $kandidat = Kandidat::find($id);
     
        return view('user.profil', [
            'data' => $kandidat,

        ]);
    }

    public function login(Request $request)
    {
        # code...
        $credential = $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);
        if (User::where('nim', $credential['nim'])->doesntExist()) {
            # code...
            Alert::error('Error', 'username/password salah');
            return back();
        }

        
       
        if (Auth::attempt(['nim' => $credential['nim'], 'password' => $credential['password']])) {
            # code...
            $request->session()->regenerate();
            if (Auth::user()->status == 0) {
                # code...
                Auth::logout();
                Alert::error('Error', 'Akun belum diaktivasi');
                return back();
            }
            return redirect()->intended('/dashboard');
        }
        Alert::error('Error', 'username/password salah');
        return back();
    }

    public function register()
    {
        # code...
        return view('user.register');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    public function vote(Request $request)
    {
        # code...
        $id_user = Auth::user()->id;
       $id_kandidat = $request->pilvote;
       
       Pilihan::create([
        'id_kandidat' => $id_kandidat,
        'id_user' => $id_user,
       ]);
       return redirect('/dashboard')->with('vote', 'telah vote!');
    }

    public function storeRegister(){
        $credential = request()->validate([
            'name' => 'required',
            'nim' => 'required',
            'password' => 'required',
        ]);
    
        if (User::where('nim', $credential['nim'])->exists()) {
            # code...
            Alert::error('Error', 'Nim sudah terdaftar');
            return back();
        }
        $credential['status'] = 0;

        $credential['password'] = bcrypt($credential['password']);
        User::create($credential);
        return redirect('/login');
    }
    
    public function pil()
    {
        $user = Auth::user()->id;
        # code...
    //    dd(Pilihan::with(['kandidat', 'user'])->get());
    dd(Kandidat::with('pilihan')->whereHas('pilihan', function($q) use($user){
        $q->where('id_user', $user);
    })->get());
        // dd($pil->kandidat);
       
    }
}
