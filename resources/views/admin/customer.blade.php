<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">

            <div class="card">

                <DIV style="height: 500px; margin:auto; display:flex; justify-content:center; align-items:center; gap:10px;">
                    <a href="{{url('admin_account')}}"><button class="btn btn-primary text-bold p-3">ADMIN ACCOUNTS</button></a>
                    <A href="{{url('customer_account')}}"><button class="btn btn-success text-bold p-3">CUSTOMER ACCOUNTS</button></A>
                </DIV>

            </div>



          </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
