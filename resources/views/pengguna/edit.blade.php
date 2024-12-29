  @extends('template.default')

  @section('content')
      <div class="row">
          <div class="col-md-6">
              <h3>Ubah Data Pengguna</h3>
          </div>
          <div class="col-md-6">
              <a href="{{ route('pengguna.index') }}" class="btn btn-primary btn-sm float-end">
                  <i class="fa fa-arrow-circle-left"></i> Kembali
              </a>
          </div>
      </div>

      <div class="card px-3 py-3">
          <form action="{{ route('pengguna.update', $pengguna) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                      id="nama" value="{{ old('nama') ?? $pengguna->nama }}" required>
                  @error('nama')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                      id="email" value="{{ old('email') ?? $pengguna->email }}" required>
                  @error('email')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="level">Level</label>
                  <select class="form-control @error('level') is-invalid @enderror" name="level" id="level" required>
                      <option value="">Pilih Level</option>
                      <option value="admin" @selected(old('level') == 'admin' || (old('level') === null && 'admin' == $pengguna->level))>
                          admin
                      </option>
                      <option value="user" @selected(old('level') == 'user' || (old('level') === null && 'user' == $pengguna->level))>
                          user
                      </option>
                  </select>
                  @error('level')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                      id="password" value="{{ old('password') }}">
                  @error('password')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="password_confirmation">Konfirmasi Password</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                      name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                  @error('password_confirmation')
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
