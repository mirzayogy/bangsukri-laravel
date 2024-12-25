  @extends('template.default')

  @section('content')
      <div class="row">
          <div class="col-md-6">
              <h3>Tambah Data Barang</h3>
          </div>
          <div class="col-md-6">
              <a href="{{ route('barang.index') }}" class="btn btn-primary btn-sm float-end">
                  <i class="fa fa-arrow-circle-left"></i> Kembali
              </a>
          </div>
      </div>

      <div class="card px-3 py-3">
          <form action="{{ route('barang.store') }}" method="POST">
              @csrf
              @method('POST')
              <div class="mb-3">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                      id="nama_barang" value="{{ old('nama_barang') }}" required>
                  @error('nama_barang')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="merk">Merk</label>
                  <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk"
                      id="merk" value="{{ old('merk') }}" required>
                  @error('merk')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="jenis">Jenis</label>
                  <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                      id="jenis" value="{{ old('jenis') }}" required>
                  @error('jenis')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="satuan_id">Satuan</label>
                  <select class="form-control @error('satuan_id') is-invalid @enderror" name="satuan_id" id="satuan_id"
                      required>
                      <option value="">Pilih Satuan</option>
                      @foreach ($satuan_collections as $satuan)
                          <option value="{{ $satuan['id'] }}" @selected($satuan['id'] == old('satuan_id'))>
                              {{ $satuan['nama_satuan'] }}
                          </option>
                      @endforeach
                  </select>
                  @error('satuan_id')
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
