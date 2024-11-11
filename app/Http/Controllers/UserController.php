<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::all();
        return view('dashboard.menu.user.index', [

            'data_user' => $data,
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
        return view('dashboard.menu.user.add');
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
            'nim' => 'required|unique:users',
            'name' => 'required|max:50',
            'password' => 'required|max:50',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['status'] = '1';
        
        User::create($validatedData);
        Alert::success('Success', 'Data user Berhasil Ditambahkan');
        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if (!$user) {
            return redirect('/admin/user');
        }

        return view('dashboard.menu.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        if (!$user) {
            return redirect('/admin/user');
        }
        $validatedData = $request->validate([
           
            'name' => 'required|max:50',
            'password' => 'max:50',
        ]);
        if ($validatedData['password']) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        User::where('id', $user->id)->update($validatedData);
        Alert::success('Success', 'Data user Berhasil diedit');
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if ($user){
            $user->delete();
            Alert::success('Success', 'Data user Berhasil dihapus');
            return redirect('/admin/user');
        }
        Alert::error('Error', 'Ada yang salah');
        return redirect('/admin/user');
    }

    public function aktivasi( $id)
    {
        $user = User::find($id);
       
        if ($user) {
            $user->status = 1;
            $user->save();
            Alert::success('Success', 'User Berhasil diaktifkan');
            return redirect('/admin/user');
        }
        Alert::error('Error', 'Ada yang salah');
        return redirect('/admin/user');
    }

    
    
}
