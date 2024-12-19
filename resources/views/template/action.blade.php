<a href="{{ route('ruang.edit', $ruang) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
<button href="#" onclick="confirmation('{{ route('ruang.destroy', $ruang) }}')"
    id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

<script>
    function confirmation(href) {
        if (confirm("Yakin hapus?")) {
            console.log(href)
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
        }
    }
</script>
