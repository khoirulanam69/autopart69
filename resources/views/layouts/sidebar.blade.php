<div class="sidebar d-flex flex-column p-3">
    <h4>Autopart69</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" id="dashboard" class="nav-link active">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="/products" id="product" class="nav-link">Products</a>
        </li>
        <li class="nav-item">
            <a href="/orders" id="order" class="nav-link">Orders</a>
        </li>
    </ul>
    <a href="{{ route('logout') }}"><button class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i>
            Logout</button></a>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            const path = window.location.pathname.split('/').filter(Boolean);
            const lastPart = path[path.length - 1];

            const activeMap = {
                'products': '#product',
                'orders': '#order'
            };

            $('#dashboard, #product, #order').removeClass('active');
            $(activeMap[lastPart] || '#dashboard').addClass('active');
        });
    </script>
@endpush
