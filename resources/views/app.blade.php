<!DOCTYPE html>
<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="{{ URL::asset('output/all.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        
    </head>
    <body>
        <header>
<!--            <div class="header-top">
               
            </div>-->
            @include('partials._navbar')
            @if (Route::currentRouteName() === 'students.index')
            <div class="container">
            <div class="search-box">
                @include('students._search')
            </div>
            </div>
            @endif
        </header>
        
        <div class="container main">
            
            @yield('content')
            
        </div>
        <div class="footer">
            
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{ URL::asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('output/all.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
        
    </body>
</html>
