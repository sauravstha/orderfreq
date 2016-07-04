<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/yeti/bootstrap.min.css" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    OrderFreq!
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/howitworks') }}">How It Works?</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/termsandconditions') }}">Terms & Conditions</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/aboutus') }}">About Us</a></li>
                </ul>

                

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>


                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Hello, {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (!Auth::guest() and (Auth::user()->roles()->where('name', 'Admin')->count() == 0))
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">


                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse2">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                <div class="collapse navbar-collapse" id="app-navbar-collapse2">   
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    <li><a href="{{ url('/orderlists/') }}">Make Order</a></li>
                    <li><a href="{{ url('/homes') }}">Homes</a></li>
                    <li><a href="{{ url('/deliveryaddresses') }}">Delivery Addresses</a></li>
                </ul>
                </div>
            </div>
        </nav>
    @endif

    @if (!Auth::guest() and (Auth::user()->roles()->where('name', 'Admin')->count() >= 1))
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">


                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse3">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse3">   
                <ul class="nav navbar-nav">
                        <li><a href="{{ url('/admin/categories') }}">Categories</a></li>
                        <li><a href="{{ url('/admin/deliveryaddresses') }}">Delivery Addresses</a></li>
                        <li><a href="{{ url('/admin/homes') }}">Homes</a></li>
                        <li><a href="{{ url('/admin/orders') }}">Orders</a></li>
                        <li><a href="{{ url('/admin/orderlists') }}">Order Lists</a></li>
                        <li><a href="{{ url('/admin/orderlistproducts') }}">Orderlistproducts</a></li>
                        <li><a href="{{ url('/admin/orderproducts') }}">Orderproducts</a></li>
                        <li><a href="{{ url('/admin/products') }}">Products</a></li>
                        <li><a href="{{ url('/admin/roles') }}">Roles</a></li>
                        <li><a href="{{ url('/admin/userroles') }}">User Roles</a></li>
                        <li><a href="{{ url('/deliveries') }}">Deliveries</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
    @yield('content')
 <!--    <footer class="footer" style="    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;
    background-color: #f5f5f5;">
        <div class="container">
            <p class="text-muted">Place sticky footer content here.</p>
        </div>
        
    </footer> -->

    <!-- JavaScripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
