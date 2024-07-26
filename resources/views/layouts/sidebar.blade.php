<div class="sidebar d-flex flex-column p-3">
    <h4>Autopart69</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" id="dashboard" class="nav-link active">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="/products" id="product" class="nav-link">Produk</a>
        </li>
        <li class="nav-item">
            <a href="/orders" id="order" class="nav-link">Order</a>
        </li>
    </ul>
    <a href="{{ route('logout') }}"><button class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i>
            Logout</button></a>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            const path = window.location.pathname;

            const activeMap = {
                'products': '#product',
                'orders': '#order'
            };

            $('#dashboard, #product, #order').removeClass('active');

            if (path.includes('products')) {
                $('#product').addClass('active');
            } else if (path.includes('orders')) {
                $('#order').addClass('active');
            } else {
                $('#dashboard').addClass('active');
            }
        });
    </script>
@endpush
