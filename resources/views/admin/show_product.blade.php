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


          @if(session()->has('message'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

            </div>

            @endif


            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title" style="font-weight: 800;">All Product</h4>
                        <p class="card-description mb-3"> A total of <span style="font-weight: bold;">{{$total_product}}</span> products
                        </p>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Description</th>
                                <th> Image </th>
                                <th> Availability </th>
                                <th> Category </th>
                                <th> Price </th>
                                <th> D Price</th>
                                <th> Archive </th>
                                <th> Edit </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td><img class="img_size" src="/product/{{$product->image}}"></td>
                                    <td>
                                        @if($product->quantity == "Available")
                                        {{$product->quantity}}
                                        @else
                                        Not Available
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->category == "Iced_Coffee")
                                        Iced Coffee
                                        @else
                                        {{$product->category}}
                                        @endif
                                    </td>
                                    <td>₱{{$product->price}}</td>
                                    <td>
                                        @if($product->discount_price != null)
                                        ₱{{$product->discount_price}}
                                        @else
                                        {{$product->discount_price}}
                                        @endif

                                    </td>


                                    <td>
                                      <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this product?')" href="{{url('delete_product', $product->id)}}">Archive</a>
                                    </td>

                                    <td>
                                      <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                          </table>
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
