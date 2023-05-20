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
      <!-- Include sidebar -->
      @include('admin.sidebar')

      <!-- Include header -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">

          <!-- Display success message -->
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
          </div>
          @endif

          <div class="card mt-5">
            <h1 class="font_size cart-title text-center mt-4 mb-1">Add Product</h1>
            <p class="text-center text-muted mb-3">Product Details</p>

            <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <!-- Left column fields -->
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="title" class="form-control text-dark" placeholder="Enter product name" required=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Price</label>
                          <div class="col-sm-8">
                            <input type="number" name="price" class="form-control text-dark" placeholder="Enter product price" min="1" required=""/>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Discounted Price</label>
                          <div class="col-sm-8">
                            <input type="number" name="discount" class="form-control text-dark" min="1" placeholder="Enter product discounted price"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                              <select class="form-control text-white" name="category" required="">
                                <option value="" selected="" class="text-muted">--select--</option>
                                @foreach($category as $category)
                                  <option class="text-white" value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Product Image</label>
                          <div class="col-sm-8">
                            <input type="file" name="image" class="form-control text-secondary" required=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Right column fields -->
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Availability</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quantity" id="membershipRadios1" value="Available" checked> Available
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="quantity" id="membershipRadios2" value="Not_Available"> Not Available
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label for="exampleTextarea1" class="col-sm-4 col-form-label">Description</label>
                          <div class="col-sm-8">
                            <textarea class="form-control text-secondary" id="exampleTextarea1" rows="4" style="width: 100%" name="description" placeholder="Product Details..." required=""></textarea>
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
            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- Include scripts -->
    @include('admin.script')

  </body>

</html>
