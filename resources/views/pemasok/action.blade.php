<a href="{{ route('pemasok.edit', $pemasok) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger btn-sm"
    onclick="confirmation('{{ route('pemasok.destroy', $pemasok) }}')">
    <i class="fa fa-trash"></i>
</button>
