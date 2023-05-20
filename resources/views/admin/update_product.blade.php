<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->


  @include('admin.css')

  <style type="text/css">

    .font_size{
        font-size: 20px;
        font-weight: 800;
    }


    .text_color{
        color:black;
        padding-bottom: 20px;
    }
    label{
        display:inline-block;
        width: 200px;
        padding-left: 10px;
    }
    .div_design{
        padding-bottom: 15px;
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

          @if(session()->has('message'))

        <div class="alert alert-success">

         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}

        </div>

        @endif
<div class="card mt-5">

          <div class="div_center">

            <h1 class="font_size cart-title text-center mt-4 mb-4">Update Product</h1>

            <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="container">
                <div class="row">
                  <div class="col-md-6">
                      <div class="row">
                          <div class="col-12">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="title" class="form-control text-dark" placeholder="Enter product name" value="{{$product->title}}" required=""/>
                                </div>
                              </div>

                          </div>
                          <div class="col-12">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Price</label>
                                <div class="col-sm-8">
                                  <input type="number" name="price" value="{{$product->price}}" class="form-control text-dark" placeholder="Enter product price" min="1" required=""/>
                                </div>
                              </div>
                          </div>
                          <div class="col-12">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Discounted Price</label>
                                <div class="col-sm-8">
                                  <input type="number" name="discount" value="{{$product->discount_price}}" class="form-control text-dark" min="1" placeholder="Enter product discounted price"/>
                                </div>
                              </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Category</label>
                                <div class="col-sm-8">
                                  <select class="form-control text-white" name="category" required="">
                                    <option value="{{$product->category}}" class="text-muted" selected="">{{$product->category}}</option>

                                    @foreach($category as $category)

                                  <option class="text-white" value="{{$category->category_name}}">{{$category->category_name}}</option>

                                  @endforeach
                                  </select>
                                </div>
                              </div>

                          </div>
                          <div class="col-12">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Current Image</label>
                                <div class="col-sm-8">
                                    <img style="" src="/product/{{$product->image}}" height="70px" width="70px" alt="">
                                </div>
                              </div>


                          </div>
                          <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Change Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" class="form-control text-secondary" vaalue="/product/{{$product->image}}" required=""/>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="row">
                          <div class="col-12">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Availability</label>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    @if($product->quantity == "Available")
                                    <input type="radio" class="form-check-input" name="quantity" id="membershipRadios1" value="Available" checked> Available </label>
                                    @else
                                    <input type="radio" class="form-check-input" name="quantity" id="membershipRadios1" value="Available"> Available </label>

                                    @endif
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    @if($product->quantity == "Not_Available")
                                    <input type="radio" class="form-check-input" name="quantity" id="membershipRadios2" value="Not_Available" checked> Not Available </label>
                                    @else
                                    <input type="radio" class="form-check-input" name="quantity" id="membershipRadios2" value="Not_Available"> Not Available </label>
                                    @endif
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                <label for="exampleTextarea1" class="col-sm-4 col-form-label">Description</label>

                                <div class="col-sm-8">
                                <textarea class="form-control text-secondary" id="exampleTextarea1" rows="4" style="width: 100%" name="description"  placeholder="Product Details..." value="aaron" required=""></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                          <div class="col-12">
                            <div style="width: 100%;">

                              <input type="submit" value="Add Product" class="btn btn-primary bg-primary" style="float:right; font-weight: 600;">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>

            </div>

            <!--

            <div class="div_design">
                <label for="">Product Name: </label>
                <input class="text_color" type="text" name="title" placeholder="Write a name" required="" >
            </div>

            <div class="div_design">
                <label for="">Product Description: </label>
                <input class="text_color" type="text" name="description" placeholder="Write a description" required="" ">
            </div>

            <div class="div_design">
                <label for="">Product Price: </label>
                <input class="text_color" type="number" name="price" placeholder="Write the price" required="" ">
            </div>

            <div class="div_design">
                <label for="">Price Discount: </label>
                <input class="text_color" min="1" type="number" name="discount" placeholder="Write price discount" >
            </div>

            <div class="div_design">
                <label for="">Product availability: </label>
                <select name="quantity" id="" class="text_color" required="">
                    <option value="Available">Available</option>
                    <option value="Not_Available">Not Available</option>
                </select>
            </div>

            <div class="div_design">
                <label for="">Product Category: </label>
                <select class="text_color" name="category" id="" required="">




                </select>
            </div>


            <div class="div_design">

            </div>


            <div class="div_design">
                <label for="">Change product image: </label>
                <input class="text_color" type="file" name="image">
            </div>

            <div class="div_design">

                <input type="submit" value="Update Product" class="btn btn-primary">
            </div>

            </form>

          </div>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
