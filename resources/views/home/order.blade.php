<!DOCTYPE html>
<html>

<head>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
    margin-bottom: 50px;
}


.cartpage {
    display: block;
    flex-direction: column;
    flex: 3 0;
    justify-content: space-evenly;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 8px;
    border-radius: 1rem;
    list-style: none;
    padding: 0;
    margin: auto;
    width: 85%;
    padding-top: 40px;
}

.cartpage .listitem {
    display: flex;
    justify-content: space-around;
    align-items: center;

    box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 30px -15px;
}

.listitem img {
    width: 70px;
    height: 70px;

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

.foods-count {
    margin-bottom: 1.5rem;
}

.foods-count::before {
    content: "Count: ";
    color: black;
}

.checkout a {
    padding: 0.5rem;
    color: white;
    background: #aa573c;
    border-radius: 1rem;
    text-align: center;
    opacity: 0.7;
    width: 100%;
    font-size: 20px;
  justify-content: center;
    align-items: center;
    display: flex;
}

.checkout a:hover {
    opacity: 1;
    cursor: pointer;
}

@media (max-width: 800px){
    .cart{
    justify-content: center;
    display: block;
    align-items: center;
    margin: auto;
    }
    .cartpage{
        margin: auto;
    }
    .checkout{
        margin: 0.5rem 0;
        margin-top: 20px;
    }
}
  </style>
</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('home/images/crop.jpg')}}" style="height: 80px;" alt="">
</div>

            <header class="header_section">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <span>TAPBox</span>
                        </a>
                    </nav>
                </div>
            </header>

    <p style="text-align: center; font-size:25px; font-weight:bold; margin-top:30px;">Orders</p>
        <div class="orders">
            <ul class="cartpage">
            @foreach($order as $order)
                <li class="listitem">

                    <div>
                        <img src="/product/{{$order->image}}" alt="{{$order->product_title}}" />
                    </div>
                    <div>
                        {{$order->product_title}}
                    </div>
                    <div>
                        {{$order->quantity}} piece/s
                    </div>
                    <div>
                        ₱{{$order->price}}
                    </div>
                    <div>
                        {{$order->payment_status}}
                    </div>
                    <div>
                        {{$order->delivery_status}}
                    </div>
                    <div>
                        @if($order->delivery_status == 'processing')
                        <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" style="position:relative; z-index:1;" onclick="confirmation(event)">Cancel Order</a>

                        @elseif($order->delivery_status == 'delivered')
                        <p style="font-weight:bold;" class="text-success">Delivered</p>

                        @elseif($order->delivery_status == 'cancelled')
                        <p style="font-weight:bold;" class="text-danger">Cancelled</p>

                        @endif
                    </div>
                </li>
            @endforeach

            </ul>

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
            title: "Are you sure to cancel your order?",
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
