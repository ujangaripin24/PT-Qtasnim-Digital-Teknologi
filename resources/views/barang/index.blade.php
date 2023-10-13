@extends('barang.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </nav>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="container">
<h3>
Table Barang
</h3>
            <div class="card ">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Jumlah Terjual</th>
                        <th>Tanggak Transaksi</th>
                        <th>Jenis Barang</th>
                        <th>Aksi</th>
            
                    </tr>
                    @foreach ($barang as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->jumlah_terjual }}</td>
                        <td>{{ $item->tanggal_transaksi }}</td>
                        <td>{{ $item->jenis_barang }}</td>
                        <td>
                            <form action="{{ route('barang.destroy',$item->id) }}" method="POST">
               
                                <a class="btn btn-info" href="{{ route('barang.show',$item->id) }}">Detail</a>
                
                                <a class="btn btn-primary" href="{{ route('barang.edit',$item->id) }}">Ubah</a>
               
                                @csrf
                                @method('DELETE')
                  
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <div class="container">
                        <nav aria-label="">
                            <ul class="pagination">
                                @for ($i = 1; $i <= $barang->lastPage(); $i++)
                                    <li class="page-item {{ $i == $barang->currentPage() ? 'active' : '' }}">
                                    </li>
                                @endfor
                            </ul>
                        </nav>
                    </div>
                </table>
        </div>
    </div>

  
    {!! $barang->links() !!}
      
@endsection