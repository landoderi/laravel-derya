<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::latest()->paginate(5);
        return view('pelanggan.index', compact('pelanggan'));
    }


    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        //validate form
	      $validated = $request->validate([
            'nama'      => 'required',
            'alamat'      => 'required',
            'no_hp'      => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->save();
        return redirect()->route('pelanggan.index');
        
    }


    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'alamat'      => 'required',
            'no_hp'      => 'required',
        ]);
        

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;      
        $pelanggan->save();
        return redirect()->route('pelanggan.index');

    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index');

    }
}
