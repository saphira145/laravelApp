<!DOCTYPE html>
<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="{{ URL::asset('output/all.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        <header>
            <div class="header-top">
                
            </div>
            @if (Route::currentRouteName() === 'students.index')
            <div class="search-box">
                @include('students._search')
            </div>
            @endif
        </header>
        <div class="container">
            @yield('content')
        </div>
        <div class="footer">
            
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{ URL::asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ URL::asset('output/all.js') }}"></script>
                
        
    </body>
</html>
