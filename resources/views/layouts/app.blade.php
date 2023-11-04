<!DOCTYPE html>
<html>
    <head>
        <title> Laravel 10 Task list APP</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        

        <h1 class="mb-4 text-2xl">@yield('title')</h1>
        @if (session()->has('success'))
        <div class="success-message">{{ session('success') }}</div>
       @endif
        <div>@yield('content')</div>
    </body>
</html>