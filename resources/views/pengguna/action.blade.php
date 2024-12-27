<a href="{{ route('pengguna.edit', $pengguna) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger btn-sm"
    onclick="confirmation('{{ route('pengguna.destroy', $pengguna) }}')">
    <i class="fa fa-trash"></i>
</button>
