<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $no = 1;
        $title = 'Admin | Petugas';
        $admin = User::where('role', 'admin')->orderBy('name')->get();
        return view('pages.admin.petugas', compact('title', 'no', 'admin'));
    }

    public function create() {    
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'profile' => 'required',
            'password' => 'required',
        ]);

        $profile = $request->file('profile');
        $imageName = $request->email .'.' . $profile->extension();
        $profile->move(public_path('assets/img/user/'), $imageName);

        $admin = new User();
        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->profile = $imageName;
        $admin->gender = $request->gender;
        $admin->phone_number = $request->telepon;
        $admin->tanggal_lahir = $request->tanggal_lahir;
        $admin->address = $request->alamat;
        $admin->password = Hash::make($request->password);
        $admin->role = 'admin';

        if ($admin->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function show($id) {  

    }

    public function edit($id) {    
        $item = User::find($id);
        return view('pages.admin.petugas', compact('item'));

    }

    public function update($id, Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $admin = User::findOrFail($id);

        if ($request->hasFile('profile')) {
            if ($admin->profile != null) {
                if ($admin->profile && file_exists(public_path('assets/img/user/' . $admin->profile))) {
                    unlink(public_path('assets/img/user/' . $admin->profile));
                }
            }
            $profile= $request->file('profile');
            $imageName = $request->email .'.' . $profile->extension();
            $profile->move(public_path('assets/img/user/'), $imageName);    
        } else {
            $imageName = $admin->profile;
        }



        if ($request->password) {
            $password = $request->password;
        } else {
            $password = $admin->password;
        }
        

        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->profile = $imageName;
        $admin->gender = $request->gender;
        $admin->phone_number = $request->telepon;
        $admin->tanggal_lahir = $request->tanggal_lahir;
        $admin->address = $request->alamat;
        $admin->password = Hash::make($password);

        if ($admin->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function destroy($id) {  
        $admin = User::find($id);

        if ($admin->profile) {
            $fotoPath = public_path('assets/img/user/' . $admin->profile);

            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        if ($admin->delete()){
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        } 
    }
}
