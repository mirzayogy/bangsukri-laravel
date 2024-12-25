<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-money-bill me-2"></i>BANGSUKRI</div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('dashboard') }}"
            class="list-group-item list-group-item-action bg-transparent abu-text fw-bold {{ $dashboard_active ?? '' }}"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="{{ route('sample') }}" class="list-group-item list-group-item-action bg-transparent abu-text fw-bold"><i
                class="fas fa-boxes me-2"></i>Barang Masuk</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent abu-text fw-bold"><i
                class="fas fa-building me-2"></i>Penempatan</a>
        <button class="list-group-item list-group-item-action bg-transparent abu-text fw-bold {{ $master_active ?? '' }}" data-bs-toggle="collapse"
            data-bs-target="#master-collapse" aria-expanded="true">
            <i class="fas fa-list me-2"></i>Master
        </button>
        <div class="collapse {{ $master_show ?? '' }}" id="master-collapse"> {{-- show --}}
            <ul class="btn-toggle-nav list-unstyled ps-4">
                <li><a href="{{ route('barang.index') }}" class="{{ $barang_active ?? 'link-dark' }} rounded">Barang</a></li>{{-- link-success --}}
                <li><a href="#" class="link-dark rounded">Karyawan</a></li>
                <li><a href="{{ route('pemasok.index') }}" class="{{ $pemasok_active ?? 'link-dark' }} rounded">Pemasok</a></li>
                <li><a href="{{ route('ruang.index') }}" class="{{ $ruang_active ?? 'link-dark' }} rounded">Ruang</a></li>
                <li><a href="{{ route('satuan.index') }}" class="{{ $satuan_active ?? 'link-dark' }} rounded">Satuan</a></li>
            </ul>
        </div>
        <form action="" method="post">
            <button name="logout_button" type="submit" onclick="javascript: return confirm('Yakin keluar?');"
                class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fas fa-power-off me-2"></i>Logout
            </button>
        </form>
    </div>
</div>
