<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  <style text="text/css">
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .h2_font{
        font-size: 40px;

    }
    .input_color{
        color:black;
    }

    .row{
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 1px solid white;
    }
    tr,td{
        padding:5px;
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

            <div class="div_center">
                <h2 class="h2_font">Product Categories</h2>


            </div>

<div class="container">
            <div class="row">
                <div class="col-lg-6 mt-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title" style=" font-weight: bold;">Add Category</h4>
                        <p class="card-description">
                            <form action="{{url('/add_category')}}" method="POST" style="display: flex;">
                            @csrf
                            <input type="text" name="category" placeholder="Write category name" class="input_color" style=" color:black;border-radius: 5px 0 0 5px; ">
                            <input type="submit" class="btn btn-primary bg-primary" name="submit" value="Add" style="border-radius: 0 5px 5px 0; font-weight:bold; color:white;">
                        </form>
                        </p>
                        <div class="table-responsive mt-3">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $data)

                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->category_name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure to delete this category?')" href="{{url('delete_category',$data->id)}}" class="btn btn-danger">Delete</a>
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
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
