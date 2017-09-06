<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <link  rel="stylesheet" href="/css/app.css">
    

    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif
            
            
            <div id="app">
  <p>@{{ message }}</p>
  <button v-on:click="reverseMessage">Reverse Message</button>
</div>

            <example></example>

        </div>

        <script src="js/vue.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/app.js"></script>

    </body>
</html>
