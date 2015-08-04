<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="{{ URL::asset('output/all.css') }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
        <header>
            <div class="header-top">
                
            </div>
            <div class="menu">
                
            </div>
            
        </header>
        <div class="container">
            @yield('content')
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{ URL::asset('output/all.js') }}"></script>
    </body>
</html>
