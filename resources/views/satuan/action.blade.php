<a href="{{ route('satuan.edit', $satuan) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-edit"></i>
</a>
<button class="btn btn-danger btn-sm"
    onclick="confirmation('{{ route('satuan.destroy', $satuan) }}')">
    <i class="fa fa-trash"></i>
</button>
