<!DOCTYPE html>
<html>

<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">

  <title>TAPBox</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

  <style>

.cart{
    justify-content: center;
    display: flex;
    align-items:center;
    margin-top: 20px;
    margin-bottom: 50px;
}

.cartpage {
    display: flex;
    flex-direction: column;
    flex: 3 0;
    justify-content: space-evenly;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 8px;
    border-radius: 1rem;
    list-style: none;
    margin: 0.5rem;
    padding: 0;

}

.cartpage .listitem {
    display: flex;
    justify-content: space-around;
    align-items: center;

    box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 30px -15px;
}

.listitem img {
    width: 4rem;
    height: 4rem;
    border-radius: 100rem;
    object-fit: cover;
}

.listitem div {
    padding: 0.5rem;
}

ul .listitem:last-child {
    border: none;
}

.listitem div:not(:first-child) {
    flex-basis: 18%;
}

.listitem select {
    width: 3rem;
    outline: none;
    border: none;
    border-bottom: 1px solid lightgrey;
    font-size: 1.1rem;
    font-weight: 100;
}

.listitem .remove-button {
    border-radius: 1rem;
    border: none;
    padding: 0.5rem;
    color: brown;
    opacity: 0.7;
    font-weight: bold;
    outline: none;
}

.listitem .remove-button:hover {
    opacity: 1;
    cursor: pointer;
    color: red;
}


.checkout {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    flex: 1 3;
    height: 20rem;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    border-radius: 1rem;
    padding: 0.5rem;
    margin: 0.5rem;
}

.checkout>div {
    font-size: 1.4rem;
    margin: 1rem;
    flex: 3;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.foods-count::before {
    content: "Count: ";
    color: black;
}

.checkout a {
    padding: 0.5rem;
    color: white;
    background: #ffbe33;
    border-radius: 1rem;
    text-align: center;
    opacity: 1;
    width: 100%;
    font-size: 20px;
    justify-content: center;
    align-items: center;
    display: flex;
    font-weight: bold;
}

.checkout a:hover {
    opacity: 0.8;
    cursor: pointer;
}

@media (max-width: 800px){
    .cart{
    justify-content: center;
    display: block;
    align-items: center;
    margin-top: 20px;
    }
    .cartpage{
        margin: 0.5rem 0;
    }
    .checkout{
        margin: 0.5rem 0;
        margin-top: 20px;
    }
}


  </style>
</head>

<body>

@include('sweetalert::alert')
  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('home/images/crop.jpg')}}" alt="" style="height: 80px;">
    </div>




<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}">
            <span>
              TAPBox
            </span>
          </a>

          <div class="collapse navbar-collapse" >
            <ul class="navbar-nav  mx-auto ">

              <div class="user_option">

            </div>

            </ul>
          </div>
        </nav>
      </div>
    </header>




    <!-- slider section -->

    @if(session()->has('message'))

        <div class="alert alert-success">

         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

        </div>

        @endif

<p style="text-align: center; margin-top:60px; font-size: 30px; font-weight:bold;">Your Cart</p>
<div class="cart">
    <?php $totalprice = 0; $totalquantity=0;?>


    <ul class="cartpage">
    @foreach($cart as $cart)
        <li class="listitem">

            <div>
                <img src="/product/{{$cart->image}}" alt="{{$cart->product_title}}" />
            </div>
            <div>

                {{$cart->product_title}}

            </div>
            <div>
                {{$cart->quantity}}
                <?php $totalquantity += $cart->quantity; ?>
            </div>
            <div>
            ₱{{$cart->price}}
            </div>
            <?php $totalprice=$totalprice + $cart->price ?>
            <div>
                <a href="{{url('remove_cart',$cart->id)}}" onclick="confirmation(event)"><button class="remove-button">Remove</button></a>
            </div>
        </li>
        @endforeach

    </ul>

    <div class="checkout">
        <div>
            <div class="countprice">
                <div class="foods-count">
                    <span style="font-weight: bold;">{{$totalquantity}} item/s</span>
                </div>
                <div class="total_price">
                Total price: <span style="font-weight: bold;">₱{{$totalprice}}</span>
                </div>
                <div>
                    @if($totalquantity > 2)
                    Shipping fee: <span style="font-weight:bold; ">Free</span>
                    @elseif($totalquantity == 0)
                    <span style="font-weight:bold; display:none;">No item in cart</span>
                    @else
                    Shipping fee: <span style="font-weight:bold; ">₱20</span>
                    <?php $totalprice=$totalprice + 20; ?>
                    @endif
                </div>
            </div>
        </div>
        <p style="color:grey; font-size:18px; margin-bottom:-25px;" class="cc">Proceed to order</p>
        <div>

            @if($cart_total !== 0)
                 <a href="{{url('cash_order')}}" style="margin-bottom:5px; z-index:1;" onclick="COD(event)">Cash On Delivery</a>
            <a href="{{url('stripe', $totalprice)}}" onclick="CARD(event)" style="z-index:1; ">Pay Using Card</a>

            @else
                <a href="{{url('show_cart')}}" style="margin-bottom:5px; z-index:1;" onclick="NOT(event)">Cash On Delivery</a>
                <a href="{{url('show_cart')}}" onclick="NOT(event)" style="z-index:1;">Pay Using Card</a>

            @endif
        </div>
    </div>
</div>


</div>
<script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to remove this product?",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }

        });
    }
</script>


<script>
      function COD(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to order this product using COD as payment?",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }

        });
    }
</script>


<script>
    function NOT(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Your cart is empty!",
          text: "Please add items to your cart!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }

      });
  }
</script>

<script>
      function CARD(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to order this product using your card as payment?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                window.location.href = urlToRedirect;
            }

        });
    }
</script>




  <!-- jQery -->
  <script src="home/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="home/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="home/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>
