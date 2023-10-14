@extends('barang.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <nav class="navbar navbar-light bg-light">

                  </nav>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="">
        <h3>
        Table Barang
        </h3>

        <div class="container-fluid" style="margin-top: 25px; ">
            <div class="row">
                <div class="row-12 pull-left">
                    <div class="pull-left" style="margin-left: 4px">
                        <form class="form-group" action="{{ route('barang.index') }}" method="GET">
                            <div>
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                <label for="start_date">Tanggal Mulai:</label>
                            </div>
                        </form>
                    </div>
                    <div class="pull-left" style="margin-left: 4px">
                        <form class="form-group" action="{{ route('barang.index') }}" method="GET">
                            <div>
                                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                <label for="end_date">Tanggal Berakhir:</label>
                            </div>
                        </form>
                    </div>
                    <div class="pull-left" style="margin-left: 4px">
                        <form class="form-group" action="{{ route('barang.index') }}" method="GET">
                            <div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="pull-left" style="margin-left: 4px">
                        <form class="form-inline" action="{{ route('barang.index') }}" method="GET">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Large" name="search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="pull-left" style="margin-left: 4px">
                        <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah</a>
                    </div>
                </div>
            </div>

        @csrf    
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
                </table>
            <div class="container-fluid">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $barang->previousPageUrl() }}">Previous</a></li>
                    @for ($i = 1; $i <= $barang->lastPage(); $i++)
                        <li class="page-item {{ $i == $barang->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $barang->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $barang->nextPageUrl() }}">Next</a></li>
                    </ul>
                </nav>
                
                </div>
            </div>
    </div>

  
    {!! $barang->links() !!}
      
@endsection