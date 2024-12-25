@extends('template.default')

@section('content')
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>Satuan</h3>
        </div>
        <div class="col-md-6">
            <a href="{{ route('satuan.create') }}" class="btn btn-success btn-sm float-end">
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
                        <th scope="col">Satuan</th>
                        <td style="width:200px">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuan_collections as $satuan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $satuan['nama_satuan'] }}</td>
                            <td>
                                @include('satuan.action')
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
