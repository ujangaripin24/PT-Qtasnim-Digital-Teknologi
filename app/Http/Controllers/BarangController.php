<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $barang = Barang::query();
    
        if ($search) {
            $barang->where('nama_barang', 'like', '%' . $search . '%');
        }
    
        if ($start_date && $end_date) {
            $barang->whereBetween('created_at', [$start_date, $end_date]);
        }
    
        $barang = $barang->latest()->paginate(5);
    
        return view('barang.index', compact('barang'))->with('i', ($barang->currentPage() - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Barang $barang)
    {
        $request -> validate([
            'nama_barang' => 'required',
            'stok' => 'required',
            'jumlah_terjual' => 'required',
            'tanggal_transaksi' => 'required',
            'jenis_barang' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required',
            'jumlah_terjual' => 'required',
            'tanggal_transaksi' => 'required',
            'jenis_barang' => 'required',
        ]);
  
        $barang->update($request->all());
  
        return redirect()->route('barang.index')->with('success','Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
  
        return redirect()->route('barang.index')->with('success','Barang deleted successfully');
    }
}
