<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index() {
        $no = 1;
        $title = 'Caraousel';
        $carousel = Carousel::orderBy('created_at')->get();
        return view('pages.admin.carousel', compact('title', 'no', 'carousel'));
    }

    public function create() {    
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);

        $logo_brand = $request->file('gambar');
        $imageName = $request->judul .'.' . $logo_brand->extension();
        $logo_brand->move(public_path('assets/img/carousel/'), $imageName);

        $carousel = new Carousel();
        $carousel->title = $request->judul;
        $carousel->carousel_image = $imageName;
        $carousel->deskripsi = $request->deskripsi;

        if ($carousel->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function show($id) {  
    }

    public function edit($id) {    
        $item = Carousel::find($id);
        return view('pages.admin.carousel', compact('item'));

    }

    public function update($id, Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $carousel = Carousel::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus file foto sebelumnya dari penyimpanan
            if ($carousel->carousel_image && file_exists(public_path('assets/img/carousel/' . $carousel->carousel_image))) {
                unlink(public_path('assets/img/carousel/' . $carousel->carousel_image));
            }
            $logo_brand = $request->file('gambar');
            $imageName = $request->title .'.' . $logo_brand->extension();
            $logo_brand->move(public_path('assets/img/carousel/'), $imageName);    
        } else {
            $imageName = $carousel->carousel_image;
        }

        $carousel->title = $request->judul;
        $carousel->carousel_image = $imageName;
        $carousel->deskripsi = $request->deskripsi;

        if ($carousel->save()) {
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function destroy($id) {  
        $carousel = Carousel::find($id);

        if ($carousel->carousel_image) {
            $fotoPath = public_path('assets/img/carousel/' . $carousel->carousel_image);

            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        if ($carousel->delete()){
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        } 
    }
}
