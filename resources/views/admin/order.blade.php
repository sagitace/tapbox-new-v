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

          <h1 class="title_deg">All Orders</h1>

          <div style="display:flex; justify-content:center; align-items:center; padding-bottom:10px; padding-top:10px;">
            <form action="{{url('search')}}" method="get">
                @csrf
                <input type="text" name="search" id="" placeholder="Search product" style="color:black;">
                <input type="submit" name="" id="" value="Search" class="btn btn-outline-primary">
            </form>
          </div>

          <table class="table_deg">
            <tr class="tr_deg">
                <th style="padding:10px;">Name</th>
                <th style="padding:10px;">Email</th>
                <th style="padding:10px;">Address</th>
                <th style="padding:10px;">Phone</th>
                <th style="padding:10px;">Product Name</th>
                <th style="padding:10px;">Quantity</th>
                <th style="padding:10px;">Price</th>
                <th style="padding:10px;">Payment Status</th>
                <th style="padding:10px;">Delivery Status</th>
                <th style="padding:10px;">Image</th>
                <th style="padding:10px;">Delivered</th>
                <th style="padding:10px;">Receipt</th>
                <th style="padding:10px;">Send Email</th>

            </tr>

            @forelse($order as $order)

            <tr>

                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>₱{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img src="/product/{{$order->image}}" alt="image" height="100px" width="100px">
                </td>
                <td>
                    @if($order->delivery_status=='processing')

                    <a href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered?')">Delivered</a>

                    @elseif($order->delivery_status=='delivered')

                    <p style="color:green">Delivered</p>

                    @elseif($order->delivery_status=='cancelled')
                    <p style="color:red">Cancelled</p>

                    @endif
                </td>
                <td>
                    <a href="{{url('print',$order->id)}}" class="btn btn-secondary">Print</a>
                </td>

                <td>
                    <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send</a>
                </td>

            </tr>

            @empty
            <tr>
                <td colspan="16" style="padding:10px; font-weight: bold;">
                    No Data Found
                </td>
            </tr>
            @endforelse

          </table>

          </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
