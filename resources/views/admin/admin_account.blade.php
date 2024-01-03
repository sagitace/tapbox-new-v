<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')


  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')


        <div class="main-panel">
          <div class="content-wrapper">
<div class="page-header">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('customer')}}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
              </ol>
            </nav>

          </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADMIN</h4>
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

                            <tbody>@foreach($user as $user)
                                <tr>
                                    @if($user->usertype==1)
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
