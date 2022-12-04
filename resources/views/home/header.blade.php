<!-- header section strats -->
<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}">
            <span class="d-flex">
              TAPBox
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('products')}}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('show_order')}}">Order</a>
              </li>

              <li>
                 <a class="cart_link" href="{{url('show_cart')}}">
              <img src="https://img.icons8.com/ios-glyphs/20/FFFFFF/shopping-cart--v1.png" style="margin-top:5px;"/>
              <span style="font-weight:bold; color: white; font-size:12px; margin-left:-3px;">{{$cart_total}}</span>
              </a>
              </li>

            @if (Route::has('login'))

            @auth
            <li class="nav-item">
                <x-app-layout></x-app-layout>
            </li>
            @else
            <li class="nav-item ml-2">
                <a href="{{ route('login') }}" class="btn btn-primary" id="logincss">
                        Login
                </a>
            </li>
            <li class="nav-item">
                 <a href="{{ route('register') }}" class="btn btn-success">
                        Register
                </a>
            </li>
            @endauth
                @endif
            </ul>



          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
