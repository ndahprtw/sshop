<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index() {
        $title = 'Setting';
        $setting = Setting::where('id', 1)->first();
        return view('pages.admin.setting', compact('title', 'setting'));
    }

    public function update($id, Request $request)
    {
        // dd($request);
        $request->validate([
            'alamat' => 'required',
            'alamat_rujukan' => 'required',
            'iframe' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
        ]);
        
    
        $info = Setting::find($id);
        $info->update($request->except(['token', 'submit']));
        if ($info->save()) {
            return redirect()->back()->with('success', 'Setting Berhasil Diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal Mengupdate Setting');
        }
    }
}
