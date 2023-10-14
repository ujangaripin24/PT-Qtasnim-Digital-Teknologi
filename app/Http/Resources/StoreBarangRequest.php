<?php

namespace App\Http\Resources;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBarangRequest extends FormRequest
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nama_barang' => 'required',
            'stok' => 'required',
            'jumlah_terjual' => 'required',
            'tanggal_transaksi' => 'required',
            'jenis_barang' => 'required',
        ];
    }
}
