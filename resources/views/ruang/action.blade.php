<a href="{{ route('ruang.edit', $ruang) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger btn-sm"
    onclick="confirmation('{{ route('ruang.destroy', $ruang) }}')">
    <i class="fa fa-trash"></i>
</button>
