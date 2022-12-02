<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
  @include('admin.css')

  <style>
    label{
        display: inline-block;
        width: 150px;
        font-size: 15px;
        font-weight: bold;
    }

  </style>
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
                <h1 style="text-align: center; font-size: 25px;">Send Email to <b>{{$order->email}}</b></h1>

            <form action="{{url('send_user_email', $order->id)}}" method="POST">

            @csrf

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email Greeting: </label>
                    <input style="color:black;" type="text" name="greeting" id="" value="Hello Tapbarkada {{$order->name}}!">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email FirstLine: </label>
                    <input style="color:black;" type="text" name="firstline" id="">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email Body: </label>
                    <input style="color:black;" type="text" name="body" id="">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email Button name: </label>
                    <input style="color:black;" type="text" name="button" id="">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email Url: </label>
                    <input style="color:black;" type="text" name="url" id="">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label for="">Email LastLine: </label>
                    <input style="color:black;" type="text" name="lastline" id="" value="Thank you for shopping with us!">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <input type="submit" value="Send Email" class="btn btn-primary">
                </div>
            </form>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
