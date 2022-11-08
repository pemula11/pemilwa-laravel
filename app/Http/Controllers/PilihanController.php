<?php

namespace App\Http\Controllers;

use App\Models\Pilihan;
use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $pil = 'hmj';
        if ($request->has('pil')) {
            # code...
            $pil = $request->pil;
        }
        # code...
      //  $kandidat = Kandidat::with('pilihan')->where('organisasi', $pil)->whereHas('')->select('pilihan.id_kandidat', DB::raw('count(*) as total'))->groupBy('id')->get();
        $pilihan = Pilihan::with('kandidat')->whereHas('kandidat', function($q) use($pil){
            $q->where('organisasi', '=', $pil);
        })->select('id_kandidat', DB::raw('count(*) as total'))->groupBy('id_kandidat')->get();
        //dd($pilihan);
        $total_user = User::count();
    //    dd($total_user);
        return view('dashboard.menu.laporan', [
            'total_user' => $total_user,
            'pilihan' => $pilihan,
            'pemilih' => 0,
        ]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pilihan  $pilihan
     * @return \Illuminate\Http\Response
     */
    public function show(Pilihan $pilihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pilihan  $pilihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pilihan $pilihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pilihan  $pilihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pilihan $pilihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pilihan  $pilihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pilihan $pilihan)
    {
        //
    }
}
