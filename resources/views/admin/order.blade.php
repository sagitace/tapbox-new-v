<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')

  <style>
    .title_deg{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }

    .table_deg{
        border: 1px solid white;
        width: 100%;
        margin: auto;
        margin-top: 30px;
        text-align: center;

    }

    .tr_deg{
        background-color: skyblue;
        color: black;
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

<div class="card">
          <h1 class="title_deg mt-4">All Orders</h1>

          <div style="display:flex; justify-content:center; align-items:center; padding-bottom:10px; padding-top:10px;">

            <form action="{{url('search')}}" method="get" style="display: flex;">
                @csrf
                <input type="text" name="search" placeholder="Search order" class="input_color" style=" color:black;border-radius: 5px 0 0 5px; ">
                <input type="submit" class="btn btn-primary bg-primary" name="submit" value="Search" style="border-radius: 0 5px 5px 0; font-weight:bold; color:white;">
            </form>



          </div>
          <div class="container">
            <div class="row">



          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">List of updated orders</h4>
                <p class="card-description" style="margin-top: -10px; margin-bottom: 5px;"><a href="{{url('detailed_orders')}}" style="text-decoration: underline; color: blue;">view</a> detailed orders
                </p>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>





                      <tr>
                        <th> Name </th>
                        <th> Product </th>
                        <th> Image </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Delivered </th>
                        <th> Receipt </th>
                        <th> Feedback </th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $order)

                        <tr>

                            <td>{{$order->name}}</td>

                            <td>{{$order->product_title}}</td>
                            <td>
                                <img src="/product/{{$order->image}}" alt="image" height="100px" width="100px">
                            </td>

                            <td>{{$order->quantity}}</td>

                            <td>₱{{$order->price}}</td>

                            <td>
                                @if($order->delivery_status=='processing')

                               <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered?')"> <button type="button" class="btn btn-warning bg-warning btn-icon-text">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Delivered </button></a>


                                @elseif($order->delivery_status=='delivered')

                                <p style="color:green">Delivered</p>

                                @elseif($order->delivery_status=='cancelled')
                                <p style="color:red">Cancelled</p>

                                @endif
                            </td>
                            <td>

                                <a href="{{url('print',$order->id)}}" type="button" class="btn btn-info btn-icon-text bg-info"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                                </a>
                            </td>

                            <td>
                                <a href="{{url('send_email',$order->id)}}" class="btn btn-success bg-success">Send</a>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="16" style="padding:10px; font-weight: bold;" class="text-center">
                                No Data Found
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>



          </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
