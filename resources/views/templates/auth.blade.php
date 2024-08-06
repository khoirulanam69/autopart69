<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Autopart69</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row justify-content-center align-items-center" style="width: 100%; height: 100vh;">
        <div class="col-xl-3 col-md-4 col-8">
            @yield('body')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- Custom Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var flashMessages = document.querySelectorAll('.flash-message');
                flashMessages.forEach(function(message) {
                    message.style.display = 'none';
                });
            }, 7000);
        });
    </script>
</body>

</html>
