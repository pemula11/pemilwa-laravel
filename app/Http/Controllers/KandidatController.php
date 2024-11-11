<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kandidat::all();
        return view('dashboard.menu.kandidat.index', [

            'data_kandidat' => $data,
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
        return view('dashboard.menu.kandidat.add');
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
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'motto' => 'max:500',
            'visi' => 'max:500',
            'misi' => 'max:500',
            'image' => 'image|file|max:3072',
            'organisasi' => 'required',
        ]);

        if ($request->file('image')) {
            # code...
            $validatedData['image'] = $request->file('image')->store('post-images');

        }
        Kandidat::create($validatedData);
        Alert::success('Success', 'Data Kandidat Berhasil Ditambahkan');
        return redirect('/admin/kandidat');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(Kandidat $kandidat)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Kandidat $kandidat)
    {

        if (!$kandidat) {
            return redirect('/admin/kandidat');
        }

        return view('dashboard.menu.kandidat.edit', [
            'kandidat' => $kandidat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        //
        if (!$kandidat) {
            return redirect('/admin/kandidat');
        }
        $validatedData = $request->validate([
            'nama' => 'required|max:50',
            'motto' => 'max:500',
            'visi' => 'max:500',
            'misi' => 'max:500',
            'image' => 'image|file|max:3072',
            'organisasi' => 'required',
        ]);

        if ($request->file('image')) {
            # code...
            if ($kandidat->image) {
                # code...
                Storage::delete($kandidat->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        Kandidat::where('id', $kandidat->id)->update($validatedData);
        Alert::success('Success', 'Data Kandidat Berhasil Diedit');
        return redirect('/admin/kandidat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kandidat $kandidat)
    {
        //
        if ($kandidat->image) {
            # code...
            Storage::delete($kandidat->image);
        }
        Kandidat::destroy($kandidat->id);
        Alert::success('Success', 'Data Kandidat Berhasil dihapus');
        return redirect('admin/kandidat');
    
    }
}
