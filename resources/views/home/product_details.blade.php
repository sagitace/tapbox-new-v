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
    @media (min-width: 992px){
        .cart{
            width: 100% !important;
        }
    }

    h3{
        color: white;
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
                        <div style="text-align:right; width:40%;" class="cart">
                            <a class="" href="{{url('show_cart')}}" style="float:right; display:block;">
                            <img src="https://img.icons8.com/ios-glyphs/40/FFFFFF/shopping-cart--v1.png" style="margin-top:5px;" width="26px" height="25px;"/>
                            <span style="font-weight:bold; color: rgb(255, 255, 255); font-size:12px; ">{{$cart_total}}</span>
                            </a>
                    </div>
                    </nav>


                </div>
            </header>

            @if(session()->has('message'))

            <div class="alert alert-success">

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

            </div>

            @endif



            <div class="container" style="margin-top: 100px;">
                <div style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;background-image: linear-gradient(to right, #222831, #3e494a);">
                <div class="row">
                    <div class="col-md-5 d-flex justify-content-center align-items-center bg-light" style="padding:50px">
                        <img src="/product/{{$product->image}}" alt="" width="325px" height="350px">
                    </div>
                    <div class="col-md-7">
                        <div class="row" style="padding: 50px 20px">
                            <div class="col-12" style="display: flex;">
                                <h3 style="font-weight: 800; font-size:40px;">{{$product->title}}</h3>
                                <div style="height: 100%;display: flex;justify-content:center; align-items:center;">
                                    <p style=" margin-left: 10px; border-radius: 20px; font-size: 12px; padding:5px; font-weight:700; color:rgb(60, 52, 52)" class="bg-warning">{{$product->category}}</p>
                                </div>

                            </div>
                            <div class="col-12">
                                @if($product->discount_price!=null)
                                    <div style="display: flex;">
                                        <h6 style="font-weight:600; padding-bottom: 15px; color:white; margin-top:15px;">
                                            Price: ₱{{$product->discount_price}} &nbsp;
                                        </h6>

                                        <h6 style="text-decoration: line-through;padding-bottom: 15px;margin-top:15px;" class="text-danger">
                                            ₱{{$product->price}}
                                        </h6>
                                         <?php $discount = (int) (round(($product->discount_price / $product->price) * 100)) - 100?>
                                        <h6 class="text-light" style="margin-top:15px;"> <span style="font-weight: 600;">&nbsp;&nbsp;{{$discount}}</span>% </h6>
                                    </div>

                                    <?php $saved = $product->price - $product->discount_price ?>


                                @else

                                    <h6 style="font-weight:600;padding-bottom: 15px; color:white;
                                    margin-top:15px;">
                                    Price: ₱{{$product->price}}
                                    </h6>
                                @endif
                            </div>
                            <div class="col-12">
                                <p style="font-size: 15px; color:white">{{$product->description}}</p>
                            </div>
                            <div class="col-12">
                                <form action="{{url('add_cart',$product->id)}}" method="POST" style="display:flex; padding-bottom: 15px; margin-top:20px;">
                                    @csrf
                                    <input type="number" name="quantity" value="0" min="1" max="20" style="width: 60px; color:black;border-radius: 5px 0 0 5px; border: 1px solid #ffbe33;">
                                    <button type="submit" class="btn" style="border-radius: 0 5px 5px 0; font-weight:bold; background:#ffbe33; color:white;">Add To Cart</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>







<!--
        <div class="container d-flex justify-content-center align-items-center" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; margin-top: 100px; margin-bottom: 100px;">


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
                        <?php $discount = (int) (round(($product->discount_price / $product->price) * 100)) - 100?>
                            <h6 class="text-dark" style=""> <span style="font-weight: bold;">&nbsp;&nbsp;{{$discount}}</span>% </h6>
                    </div>

                    <?php $saved = $product->price - $product->discount_price ?>
                    <h6 style="padding-bottom: 15px;">This product is<b> {{$product->quantity}}</b>, get it now and save ₱{{$saved}}! </h6>

                @else

                    <h6 style="font-weight:bold;padding-bottom: 15px;">
                    <b>Price: </b>₱{{$product->price}}
                    </h6>

                <h6 style="padding-bottom: 15px;">This product is<b> {{$product->quantity}}</b>, get it now!</h6>

                @endif

                <form action="{{url('add_cart',$product->id)}}" method="POST" style="display:flex; padding-bottom: 15px;">
                @csrf
                <input type="number" name="quantity" value="0" min="1" max="20" style="width: 60px; color:black;border-radius: 5px 0 0 5px; border: 2px solid #ffbe33;">
                <button type="submit" class="btn" style="border-radius: 0 5px 5px 0; font-weight:bold; background:#ffbe33; color:white;">Add To Cart</button>
                </form>

                </div>
            </div>
            </diV>
        </div>
    -->



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
