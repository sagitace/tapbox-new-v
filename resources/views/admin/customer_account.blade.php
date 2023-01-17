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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('customer')}}">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Customer</li>
                </ol>
              </nav>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customers:</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> NAME </th>
                                    <th> EMAIL </th>
                                    <th> NUMBER </th>
                                    <th> ADDRESS </th>
                                    <th> EMAIL VERIFIED AT </th>
                                    <TH> CREATED AT </TH>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    @if($user->usertype==0)
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    @if($user->email_verified_at == NULL)
                                    <td class="text-danger">Not yet verified</td>
                                    @else
                                    <td class="text-success">{{$user->email_verified_at}}</td>
                                    @endif
                                    <td class="text-warning">{{$user->created_at}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
