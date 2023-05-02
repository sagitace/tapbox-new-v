<section class="food_section layout_padding-bottom">
    <div class="container" >

      <div class="heading_container heading_center">
        <h2>Our Menu</h2>

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


        <div id="myBtnContainer">
            <button class="btn2 actived" onclick="filterSelection('all')"> All</button>

            @foreach($category as $category)

            @if($category->category_name=='Iced_Coffee')
                <button class="btn2" onclick="filterSelection('{{$category->category_name}}')"> Iced Coffee</button>

            @else
                <button class="btn2" onclick="filterSelection('{{$category->category_name}}')"> {{$category->category_name}}</button>
            @endif

            @endforeach

        </div>



        <div class="filters-content">
            <div class="row grid d-flex" >

                @foreach($product as $products)

                @if($products->quantity == "Available")
<a href="{{url('product_details',$products->id)}}" style="z-index: 1;" class="btn3">

          <div class="col-sm-6 col-lg-4 filterDiv {{$products->category}}">
            <div class="box">
              <div>
                <div class="img-box">
                  <img style="height: 170px; width:150px;" src="product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                  <h5 class="mt-2" style="font-weight: bold;">
                    {{$products->title}}
                  </h5>

                  <div class="options">

                @if($products->discount_price!=null)

                <div style="display:flex;" class="mt-2">
                    <h6 style="margin-right:5px; font-weight:bold;">
                        ₱{{$products->discount_price}}
                    </h6>

                    <h6 style="text-decoration: line-through; " class="text-danger">
                        ₱{{$products->price}}
                    </h6>
                    <?php $discount =(int) (round(($products->discount_price / $products->price) * 100)) - 100?>
                    <h6 class="text-light" style=""> <span style="font-weight: bold;">&nbsp;&nbsp;{{$discount}}</span>% </h6>
                </div>

                <?php $saved = $products->price - $products->discount_price ?>
                <h6 class="text-success" style="font-size: 20px; font-weight: bold;">&nbsp; Save ₱{{$saved}}!</h6>

                @else

                    <h6 style="font-weight:bold;">
                        ₱{{$products->price}}
                    </h6>

                @endif

                  </div>
            <div style="margin: 15px 0;">

                <h6 >Product is <span style="font-weight: bold;"class="text-warning">{{$products->quantity}}</span>!</h6>

            </div>


                </div>

              </div>
            </div>
          </div>
</a>

          @else
          <div class="col-sm-6 col-lg-4 all">
            <div class="box">
              <div>
                <div class="img-box">
                  <img style="height: 170px; width:150px;" src="product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    {{$products->title}}
                  </h5>
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

                  </div>
            <div style="margin: 10px 0">

                <h5 class="text-danger" style="font-size: 15px;">OUT OF STOCK!</h5>

            </div>
                </div>
              </div>
            </div>
          </div>

          @endif
                @endforeach

            </div>

            <span style="margin: 500px;">{!!$product->withQueryString()->links('pagination::bootstrap-5')!!}</span>
        </div>
    </div>
</section>

