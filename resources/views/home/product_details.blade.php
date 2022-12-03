<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->

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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <style>
    .btn{
        opacity: 1;
    }
    .btn:hover{
        opacity:0.8;
    }
    @media (max-width: 575px) {
        .title{
            text-align: center;
        }
    }

  </style>
</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('home/images/crop.jpg')}}" alt="" style="height: 80px;">
    </div>
    <header class="header_section">
                <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="{{url('/')}}" >
                            <span>TAPBox</span>
                        </a>
                    </nav>
                </div>
            </header>



        <div class="container d-flex justify-content-center align-items-center" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; margin-top: 100px; margin-bottom: 100px; position:relative;">

        <img src="{{asset('home/images/c1.png')}}" alt="" style="position: absolute;left: 0;top: 0;display: block;height: 200px;width: 200px;background: url(TRbanner.gif) no-repeat;text-indent: -999em;text-decoration: none; margin-left:-40px;margin-top:-40px;">

        <img src="{{asset('home/images/icons8-gift.gif')}}" alt="" style="position: absolute;right: 0;top: 0;display: block;height: 100px;width: 100px;background: url(TRbanner.gif) no-repeat;text-indent: -999em;text-decoration: none;">
            <diV class="row">
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div class="img-box" style="padding: 30px;">
                        <img src="/product/{{$product->image}}" alt="" width="325px" height="350px">
                    </div>
                </div>
                <div class="col-lg-8 d-flex justify-content-center align-items-center">
                    <div class="detail-box">
                  <h3 style="padding-bottom: 20px; font-weight:bold;" class="title">{{$product->title}}</h3>

                  <h6 style="padding-bottom: 15px;"><b>Product Category:</b> {{$product->category}}</h6>

                  <p style="padding-bottom: 15px;"><b>Product Details: </b>{{$product->description}}</p>

                  @if($product->discount_price!=null)
                    <div style="display: flex;">
                        <h6 style="font-weight:bold; padding-bottom: 15px;">
                            <b>Price: </b>₱{{$product->discount_price}} &nbsp;
                        </h6>

                        <h6 style="text-decoration: line-through;padding-bottom: 15px;" class="text-danger">
                             ₱{{$product->price}}
                        </h6>
                    </div>

                @else

                    <h6 style="font-weight:bold;padding-bottom: 15px;">
                    <b>Price: </b>₱{{$product->price}}
                    </h6>

                @endif

                <h6 style="padding-bottom: 15px;"><b>Available Quantity:</b> {{$product->quantity}}</h6>


                <form action="{{url('add_cart',$product->id)}}" method="POST" style="display:flex; padding-bottom: 15px;">
                @csrf
                <input type="number" name="quantity" value="0" min="1" max="{{$product->quantity}}" style="width: 60px; color:black;border-radius: 5px 0 0 5px; border: 2px solid #ffbe33;">
                <button type="submit" class="btn" style="border-radius: 0 5px 5px 0; font-weight:bold; background:#ffbe33; color:white;">Add To Cart</button>
                </form>

                </div>
            </div>
            </diV>
        </div>




</div>
  <!-- footer section -->
  @include('home.footer')
  <!-- footer section -->

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
