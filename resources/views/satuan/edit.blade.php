  @extends('template.default')

  @section('content')
      <div class="row">
          <div class="col-md-6">
              <h3>Ubah Data Satuan</h3>
          </div>
          <div class="col-md-6">
              <a href="{{ route('satuan.index') }}" class="btn btn-primary btn-sm float-end">
                  <i class="fa fa-arrow-circle-left"></i> Kembali
              </a>
          </div>
      </div>

      <div class="card px-3 py-3">
          <form action="{{ route('satuan.update',$satuan) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nama_satuan">Nama Satuan</label>
                  <input type="text"
                    class="form-control @error('nama_satuan') is-invalid @enderror"
                    name="nama_satuan"
                    id="nama_satuan"
                    value="{{ old('nama_satuan') ?? $satuan->nama_satuan }}" required>
                  @error('nama_satuan')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="col mb-3">
                  <button class="btn btn-success" type="submit">
                      <i class="fas fa-save"></i>
                      Simpan
                  </button>
              </div>
          </form>
      </div>
  @endsection
