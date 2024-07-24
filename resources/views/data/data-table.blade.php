<table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Tanggal Beli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>KVY-001</td>
            <td>Pelampung Bensin Beat</td>
            <td>20</td>
            <td>22000</td>
            <td>26000</td>
            <td>22/07/2024</td>
            <td>
                <i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i>
                <i class="fa-solid fa-trash mx-1" style="color: red"></i>
                <i class="fa-solid fa-print mx-1" style="color: blue"></i>
            </td>
        </tr>
    </tbody>
</table>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
@endpush
