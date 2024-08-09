<table id="ordersTable" class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Produk</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('api.orders') }}',
                columns: [{
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'products',
                        name: 'products',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    if (data.status === 'lunas') {
                        $('td', row).addClass('bg-lunas');
                    }
                }
            });
        });
    </script>
@endpush
