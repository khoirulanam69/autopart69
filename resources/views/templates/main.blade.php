<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Autopart69</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- data table --}}
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    {{-- icon --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar-overlay"></div>
    @include('layouts.sidebar')
    <div class="flex-grow-1 d-flex flex-column">
        @include('layouts.navbar')

        <div class="content-container p-3">
            @yield('content')
        </div>
    </div>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- data table --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- icon --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    {{-- Custom Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var flashMessages = document.querySelectorAll('.flash-message');
                flashMessages.forEach(function(message) {
                    message.style.display = 'none';
                });
            }, 5000);
        });

        // Toggle sidebar on mobile
        document.querySelector('.navbar-toggler-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.sidebar-overlay').classList.toggle('active');
        });

        // Close sidebar when clicking outside
        document.querySelector('.sidebar-overlay').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.remove('active');
            document.querySelector('.sidebar-overlay').classList.remove('active');
        });

        // Toggle navbar on mobile
        document.querySelector('.navbar-toggler-navbar').addEventListener('click', function() {
            document.querySelector('.navbar-collapse').classList.toggle('show');
        });

        function handleProductForm() {
            document.getElementById('add-product').addEventListener('click', function() {
                let productWrapper = document.getElementById('products-wrapper');
                let newProductItem = document.querySelector('.product-item').cloneNode(true);
                newProductItem.querySelector('.product-select').value = '';
                newProductItem.querySelector('.product-quantity').value = '';
                productWrapper.appendChild(newProductItem);
            });

            document.getElementById('products-wrapper').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-product')) {
                    e.target.closest('.product-item').remove();
                }
            });
        }

        // Initialize product form handler on page load
        document.addEventListener('DOMContentLoaded', handleProductForm);
    </script>
    @stack('scripts')
</body>

</html>
