
  <section class="food_section layout_padding-bottom">
    <div class="container" >

      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>

        <br>

        <div>
            <form action="{{url('product_search')}}" method="GET" style="display: flex;">
                <input type="text" name="search" placeholder="Search product" style="border-right: none; border:3px solid #ffbe33; border-radius: 5px 0 0 5px;outline: none;width:100%;" class="shs">
                <button type="submit" class="btn btn-primary" style="color:black; border: 1px solid #ffbe33;background: #ffbe33; color:white; font-weight:bold;border-radius: 0 5px 5px 0;cursor: pointer;font-size: 20px;">Search</button>
            </form>
        </div>

      </div>

      @if(session()->has('message'))

<div class="alert alert-success">

 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('message')}}

</div>

@endif



<ul class="filters_menu">
        <li class="active" data-filter="*">All</li>

        @foreach($category as $category)

        <li data-filter=".{{$category->category_name}}">{{$category->category_name}}</li>

        @endforeach
      </ul>

      <div class="filters-content">
        <div class="row grid d-flex">

            @foreach($product as $products)

          <div class="col-sm-6 col-lg-4 all {{$products->category}}">
            <div class="box">

              <div>
                <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    {{$products->title}}
                  </h5>
                  <p>
                  {{$products->description}}
                  </p>
                  <div class="options">

                @if($products->discount_price!=null)

                <div style="display:flex;">
                    <h6 style="margin-right:5px; font-weight:bold;">
                        ₱{{$products->discount_price}}
                    </h6>

                    <h6 style="text-decoration: line-through; " class="text-danger">
                        ₱{{$products->price}}
                    </h6>
                </div>

                @else

                    <h6 style="font-weight:bold;">
                        ₱{{$products->price}}
                    </h6>

                @endif

<a href="{{url('product_details',$products->id)}}" style="margin-right: 5px; font-size:15px; font-weight:bold; padding-left:5px;padding-right:5px;">View</a>
                  </div>

                  <div style="display: flex; justify-content:center; align-items:center; margin-top: 18px; margin-bottom:-10px;">
                <form action="{{url('add_cart',$products->id)}}" method="POST" style="display:flex;">
                @csrf
                <input type="number" name="quantity" value="0" min="1" max="{{$products->quantity}}" style="width: 60px; color:black;border-radius: 5px 0 0 5px; border:yellow;">
                <button type="submit" class="btn btn-success" style="border-radius: 0 5px 5px 0;">Add To Cart</button>
                </form>
            </div>
                </div>

              </div>
            </div>
          </div>
        @endforeach

    </div>

    <span style="margin: 500px;">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
  </section>

