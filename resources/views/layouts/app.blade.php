<!DOCTYPE html>
<html>
    <head>
        <title> Laravel 10 Task list APP</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css\app.css') }}" />
    </head>
    <body>
        
        @if (session()->has('success'))
         <div class="success-message">{{ session('success') }}</div>
        @endif
        <h1>@yield('title')</h1>
        <div>@yield('content')</div>
    </body>
</html>