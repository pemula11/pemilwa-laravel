<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        return view('dashboard.menu.data_kandidat', [

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
        return view('dashboard.menu.tambah_kandidat');
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

        return redirect('/admin/kandidat')->with('success', 'New Post Has Been Added');
    

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
        //
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

        return redirect('admin/kandidat')->with('success', ' kandidat Has Been Deleted');
    
    }
}
