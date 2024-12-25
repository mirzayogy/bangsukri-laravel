  @extends('template.default')

  @section('content')
      <div class="row">
          <div class="col-md-6">
              <h3>Ubah Data Pemasok</h3>
          </div>
          <div class="col-md-6">
              <a href="{{ route('pemasok.index') }}" class="btn btn-primary btn-sm float-end">
                  <i class="fa fa-arrow-circle-left"></i> Kembali
              </a>
          </div>
      </div>

      <div class="card px-3 py-3">
          <form action="{{ route('pemasok.update', $pemasok) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nama_pemasok">Nama Pemasok</label>
                  <input type="text" class="form-control @error('nama_pemasok') is-invalid @enderror" name="nama_pemasok"
                      id="nama_pemasok" value="{{ old('nama_pemasok') ?? $pemasok->nama_pemasok }}" required>
                  @error('nama_pemasok')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="nama_kontak">Contact Person (CP)</label>
                  <input type="text" class="form-control @error('nama_kontak') is-invalid @enderror" name="nama_kontak"
                      id="nama_kontak" value="{{ old('nama_kontak') ?? $pemasok->nama_kontak }}" required>
                  @error('nama_kontak')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="nomor_hp">Nomor Handphone CP</label>
                  <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp"
                      id="nomor_hp" value="{{ old('nomor_hp') ?? $pemasok->nomor_hp }} " required>
                  @error('nomor_hp')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                      id="alamat" value="{{ old('alamat') ?? $pemasok->alamat }}" required>
                  @error('alamat')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="region">Region</label>
                  <select class="form-control @error('region') is-invalid @enderror" name="region" id="region" required>
                      <option value="">Pilih Region</option>
                      <option value="dalam kota" {{ old('region') || $pemasok->region == 'dalam kota' ? 'selected' : '' }}>
                          dalam kota
                      </option>
                      <option value="dalam provinsi" {{ old('region') || $pemasok->region == 'dalam provinsi' ? 'selected' : '' }}>
                          dalam provinsi
                      </option>
                      <option value="dalam negeri" {{ old('region') || $pemasok->region == 'dalam negeri' ? 'selected' : '' }}>
                          dalam negeri
                      </option>
                      <option value="luar negeri"{{ old('region') || $pemasok->region == 'luar negeri' ? 'selected' : '' }}>
                          luar negeri
                      </option>
                  </select>
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
