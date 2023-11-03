<!DOCTYPE html>
<html>
    <head>
        <title> Laravel 10 Task list APP</title>
    </head>
    <body>
        
        @if (session()->has('success'))
         <div class="success-message">{{ session('success') }}</div>
        @endif
        <h1>@yield('title')</h1>
        <div>@yield('content')</div>
    </body>
</html>