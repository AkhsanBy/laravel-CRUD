<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="/css/select2.min.css">
</head>

<body>
    @include('layouts/navigation')
    <div class="mx-5 mt-4">
        @yield('content')   
    </div>
    <script src="/js/jquery-3.5.1.js"></script>
    <script src="/js/all.min.js"></script>
    <script src="/js/mdb.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2({
                placeholder: "Choose some tags"
            });
        });
    </script>
</body>

</html>