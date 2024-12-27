<a href="{{ route('barang.edit', $barang) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger btn-sm"
    onclick="confirmation('{{ route('barang.destroy', $barang) }}')">
    <i class="fa fa-trash"></i>
</button>
