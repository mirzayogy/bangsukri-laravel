@extends('template.default')

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>Barang</h3>
        </div>
        <div class="col-md-6">
            <a href="{{ route('barang.create') }}" class="btn btn-success btn-sm float-end">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Satuan</th>
                        <td style="width:200px">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang_collections as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang['nama_barang'] }}</td>
                            <td>{{ $barang['merk'] }}</td>
                            <td>{{ $barang['jenis'] }}</td>
                            <td>{{ $barang['satuan']->nama_satuan}}</td>
                            <td>
                                @include('barang.action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form action="" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="submit" value="Hapus" style="display:none">
    </form>
@endsection
