<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Foto::all();
        return view('foto.index', compact('foto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   dd($request->all());
        $this->validate($request,[
            'judul_foto' =>'required',
            'lokasi_file' =>'required|mimes:png,jpg,jpeg,svg|max:2048',
            'deskripsi' =>'required'
        ],[
            'judul_foto.required' => 'Judul foto harus diisi',
            'lokasi_file.required' => 'Lokasi file harus diisi',
            'lokasi_file.mimes' => 'Format file harus png,jpg,jpeg,svg',
            'lokasi_file.max' => 'file tidak boleh melebihi 2mb',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ]);

            //upload image
            $images = $request->file('lokasi_file');
            $imageName = $images->hashName();
            $images->storeAs('public/images',$imageName);

            // Menyimpan data foto ke database
           Foto::create([
            'judul_foto' => $request->judul_foto,
            'lokasi_file' => $imageName,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
           ]);
            return redirect()->back()->with('success', 'Foto berhasil diunggah');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $foto = Foto::find($id);
      $islike = Like::where('user_id', auth()->id())->where('foto_id', $foto->id)->exists();
      return view('foto.show', compact('foto', 'islike'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
      $this->validate($request,[
           'lokasi_file' =>'mimes:png,jpg,jpeg,svg|max:2048',
      ],[
          'lokasi_file.mimes' => 'Format file harus png,jpg,jpeg,svg',
          'lokasi_file.max' => 'file tidak boleh melebihi 2mb',
      ]);

        $foto = Foto::find($id);

        // mengecek apakah ada image yang sudah di upload sebelumya
        if ($request->hasFile($foto)) {

            //upload  foto baru
            $images = $request->file('lokasi_file');
            $imageName = $images->hashName();
            $images->storeAs('public/images',$imageName);

            // menghapus foto lama
            Storage::delete('public/images/'.$foto->lokasi_file);

            $foto->update([
                'lokasi_file' => $imageName,
                'juduk_foto' => $request->judul_foto,
                'deskripsi' => $request->deskripsi,
                'user_id' => Auth::user()->id,
            ]);

        } else {
        //upload foto tanpa gambar
        $foto->update([
            'judul_foto' => $request->judul_foto,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
        ]);
        }

        return redirect()->back()->with('success', 'Foto berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto = Foto::find($id);
        if ($foto){
            Storage::delete($foto->lokasi_file);
        }
        $foto->delete();
        return redirect()->route('foto_index')->with('success', 'Foto berhasil dihapus');
    }
}
