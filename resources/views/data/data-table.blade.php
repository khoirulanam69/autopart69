<table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Tanggal Beli</th>
            <th>Vendor</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('api.products') }}',
                columns: [{
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'buy',
                        name: 'buy'
                    },
                    {
                        data: 'sell',
                        name: 'sell'
                    },
                    {
                        data: 'updated_at',
                        name: 'date'
                    },
                    {
                        data: 'vendor',
                        name: 'vendor'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
