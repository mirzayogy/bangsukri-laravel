  @extends('template.default')

  @section('content')
      @if (session('success'))
          <div class="alert alert-primary" role="alert">
              {{ session('success') }}
          </div>
      @endif
      <div class="row">
          <div class="col-md-6">
              <h3>Ubah Password</h3>
          </div>
      </div>

      <div class="card px-3 py-3">
          <form action="{{ route('pengguna.updatepassword') }}" method="POST">
              @csrf
              @method('POST')
              <div class="mb-3">
                  <label for="password_lama">Password Lama</label>
                  <input type="password" class="form-control @error('password_lama') is-invalid @enderror"
                      name="password_lama" id="password_lama" required>
                  @error('password_lama')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                      id="password" required>
                  @error('password')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
              <div class="mb-3">
                  <label for="password_confirmation">Konfirmasi Password</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                      name="password_confirmation" id="password_confirmation" required>
                  @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
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
