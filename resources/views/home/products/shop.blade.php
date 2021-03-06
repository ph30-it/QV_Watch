@extends('layouts.master')
@section('title')QV_Watch|Shop
@stop

@section('content')

<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{ asset('images/banner/banner5.jpg') }}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>         
          <li class="active">Shop</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head"><!-- 
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
              </div> -->
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach($products as $item)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{route('product-detail',$item['id'])}}"><img src="{{$item['images'][0]['path']}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="{{ route('add-cart', $item['id']) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{route('product-detail',$item['id'])}}">{{ $item['description'] }}</a></h4>
                      <span class="aa-product-price">{{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</span><span class="aa-product-price"><del>{{ number_format($item['price']).'₫' }}</del></span>
                      <p class="aa-product-descrip">{{ $item['long_description'] }}.</p>
                    </figcaption>
                  </figure>                        
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    
                    <a href="" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                  </div>
                  <!-- product badge -->
                  @if($item['priceSale'] != 0)
                        <span class="aa-badge aa-sold-out" style="margin-top: 30px;" href="#">SALE!</span>
                      @endif
                      @foreach($newproduct as $new) 
                      @if($new['id']==$item['id'])
                        <span class="aa-badge aa-sale" style="margin-top: -10px;" href="#">NEW!</span>
                      @endif
                      @endforeach
                      
                        <!-- <span class="aa-badge aa-hot" href="#">HOT!</span> -->
                </li>
                @endforeach 
                                                 
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <div class="aa-prod-quantity">
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav style="margin-right: 400px;">
                {!! $products->links() !!}
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach($categories as $item)
                  <li><a href="?cate={{$item->id}}">{{ $item->name }}</a></li>
                @endforeach
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  @foreach($toprate as $top)
                  <?php $query = App\Product::where('id',$top->product_id)->get(); ?>
                  @foreach($query as $item)
                  <li>
                    <a href="{{route('product-detail',$item['id'])}}" class="aa-cartbox-img"><img alt="img" src="{{asset($item['images'][0]['path'])}}"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="{{route('product-detail',$item['id'])}}">{{ $item['name'] }}</a></h4>
                      <p>1 x {{ number_format($item['price']-($item['price']*$item['priceSale']/100)).'₫' }}</p>
                    </div>                    
                  </li>
                  @endforeach
                  @endforeach                                     
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

@stop