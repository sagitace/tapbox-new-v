<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no" />  <!-- Site Metas -->
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

.filterDiv {
  display: none; /* Hidden by default */
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}


#myBtnContainer{
  padding: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    list-style-type: none;
    margin: 45px 0 20px 0;
}
#myBtnContainer button{
  padding: 7px 25px;
    cursor: pointer;
    border-radius: 25px;
    border: none;
    background-color: rgb(0,0,0,0);
}

#myBtnContainer .btn2.actived{
  background-color: #000000;
    color: #ffffff;
}

.gone1{
    opacity:0.5;
}
    @media(max-width: 1000px){
        .gone1{
            opacity: 0;
        }
    }

</style>

</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('home/images/hero-bg.jpg')}}" alt="">
    </div>
    @include('home.header') <!-- include header file -->
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
  </div>

  <!-- offer section -->
  @include('home.offer')
  <!-- end offer section -->


  <!-- food section -->
    @include('home.product_view')
  <!-- end food section -->

  <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

<script>
  filterSelection("all")

  function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("filterDiv");
      if (c == "all") c = "";
      for (i = 0; i < x.length; i++) {
          w3RemoveClass(x[i], "show");
          if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
      }
  }

  function w3AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
          if (arr1.indexOf(arr2[i]) == -1) {
              element.className += " " + arr2[i];
          }
      }
  }

  function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
          while (arr1.indexOf(arr2[i]) > -1) {
              arr1.splice(arr1.indexOf(arr2[i]), 1);
          }
      }
      element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)
  var header = document.getElementById("myBtnContainer");
        var btns = header.getElementsByClassName("btn2");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("actived");
                $('.btn2').removeClass('actived');
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" actived", "");
                }
                this.className += " actived";
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

</body>

</html>
