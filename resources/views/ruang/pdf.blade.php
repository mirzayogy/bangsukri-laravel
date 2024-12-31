<style type="text/css">
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    td.angka {
        text-align: right;
    }

    td.garisbawah {
        text-align: center;
        border-bottom: 1px solid;
        padding-bottom: 6px;
    }

    td.info {
        border: 0px;
        padding: 2px;
    }
</style>
<table>
    <colgroup>
        <col style="width: 100%">
    </colgroup>
    <tbody>
        <tr>
            <td class="info garisbawah">
                <img style="height: 100px;" src="{{ asset('images/kop.png') }}" alt="">
            </td>
        </tr>
    </tbody>
</table>
<br>
<div style="text-align: center">
    <span style="font-size: 20px; font-weight: bold; ">Data Ruang<br></span>
</div>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 95%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ruang</th>
        </tr>
    </thead>
    @foreach ($ruang_collections as $ruang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ruang['nama_ruang'] }}</td>
        </tr>
    @endforeach
</table>
