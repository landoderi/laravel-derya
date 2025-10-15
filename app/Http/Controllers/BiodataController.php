<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Storage;
use Str;

class BiodataController extends Controller
{

    public function index()
    {
        $biodata = Biodata::latest()->paginate(5);
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        //validate form
	      $validated = $request->validate([
            'nama'      => 'required|min:5',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $biodata = new Biodata();
        $biodata->nama = $request->nama;
        $biodata->tgl_lahir= $request->tgl_lahir;
        $biodata->jk = $request->jk;
        $biodata->agama = $request->agama;
        $biodata->alamat = $request->alamat;
        $biodata->tinggi_badan = $request->tinggu_badsn;
        $biodata->berat_badam = $request->berat_badan;
	      // upload image
        if ($request->hasFile('image')) {
            $file       = $request->file('image');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path       = $file->storeAs('biodata', $randomName, 'public');
            // memasukan nama image nya ke database
            $biodata->image = $path;
        }

        $biodata->save();
        return redirect()->route('biodata.index');
    }

    public function show($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.show', compact('biodata'));
    }

    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'      => 'required|min:5',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
        

        $biodata = Biodata::findOrFail($id);
        $biodata->nama = $request->nama;
        $biodata->tgl_lahir= $request->tgl_lahir;
        $biodata->jk = $request->jk;
        $biodata->agama = $request->agama;
        $biodata->alamat = $request->alamat;
        $biodata->tinggi_badan = $request->tinggu_badsn;
        $biodata->berat_badam = $request->berat_badan;
	      
	      if ($request->hasFile('image')) {
            // menghapus foto lama
            Storage::disk('public')->delete($biodata->image);

            // upload foto baru
            $file       = $request->file('image');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path       = $file->storeAs('produks', $randomName, 'public');
            // memasukan nama image nya ke database
            $biodata->image = $path;
        }

        $biodata->save();
        return redirect()->route('biodata.index');

    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        Storage::disk('public')->delete($biodata->image);
        $biodata->delete();
        return redirect()->route('biodata.index');

    }
}