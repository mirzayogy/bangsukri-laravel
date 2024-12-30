@extends('template.default')

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>Ruang</h3>
        </div>
        <div class="col-md-6">
            <a href="{{ route('ruang.create') }}" class="btn btn-success btn-sm float-end">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>
            <a href="{{ route('ruang.ruangpdf') }}" target="_blank" class="btn btn-primary btn-sm float-end me-1">
                <i class="fa fa-print"></i> Cetak
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Ruang</th>
                        <td style="width:200px">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruang_collections as $ruang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ruang['nama_ruang'] }}</td>
                            <td>
                                @include('ruang.action')
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
