<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiBarangColection;
use App\Http\Resources\ApiBarangResource;
use App\Http\Resources\StoreBarangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;

class ApiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ApiBarangColection(Barang::paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Barang $barang)
    {
        return new ApiBarangResource($barang);
    }

    /**
     * Display the specified resource.
     */
    public function store(StoreBarangRequest $request)
    {
        Barang::created($request->validate());
        return response()->json("Barang Dibuat");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBarangRequest $request, Barang $barang)
    {
        $barang->update($request->validate());
        return response()->json("Barang Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return response()->json('Skill dihapus');
    }
}
