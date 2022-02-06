@extends('layout.app')
@section('content')


<header>
  {{-- <div class="header-image">
    <img src="{{asset('assets/image/back-freepik.jpg')}}" class="w-100">
  </div> --}}
    <div class="header-form-search">
      <form action="/search" method="GET" class="d-flex">
        <input class="form-control me-2" style="border-radius: 0.5;
        border: 2px solid #6C63FF;" type="search" name="product" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
</header>


    <div class="category">

        <div class="col-sm-12 card-category">
        <div class="container">
                <div class="row ">
                    
                  @foreach($category as $ct)
                  <div class="col-sm-4 field-category">
                        <a href="/category/{{$ct->id}}/product" >
                            <embed type="image/jpg" src="{{asset('assets/image/icon/' .$ct->icon)}}">
                        </a>
                        <p>{{$ct->name}}</p>
                    </div>
                   @endforeach 
                </div>
            </div>
        </div>

    </div>

   

    <div class="product">
                <div class="col-sm-12">
                   <div class="container">
                    <div class="product-all justify-content-end">
                        <a href="/allproduct">All Product</a>
                    </div>
                    <div class="owl-carousel owl-theme">
                      @foreach ($product as $prd)
                          
                      
                        <div class="col-sm-4 product-card">
                            <div class="card" >
                                <img src="{{asset('assets/image/product/' .$prd->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{$prd->name}}</h5>
                                  <h6>{{$prd->rating}}<i class="fas fa-star text-warning"></i></h6>
                                  <p>Stock : {{$prd->stock}}</p>
                                  <p class="card-text">{{$prd->price}}</p>
                                  <a href="/product/{{$prd->id}}/detail" class="btn btn-danger btn-block">Detail</a>
                                </div>
                              </div>
                        </div>
                        @endforeach
                      </div>
                   </div>
                </div>
        </div>


        <div class="product-lates">
            <div class="col-sm-12 mt-5 mb-5">
              <div class="header-product-lates text-center" style="padding-top:40px">
                <h4>Lates</h4>
              </div>
              <div class="row">
                @foreach( $latesProduct as $lp)
                <div class="col-sm-3 product-card-lates">
                  <div class="card">
                      <img src="{{asset('assets/image/product/' . $lp->image)}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{$lp->name}}</h5>
                        <h6>{{$lp->rating}}<i class="fas fa-star text-warning"></i></h6>
                        <p>Stock : {{$lp->stock}}</p>
                        <p class="card-text">{{$lp->price}}</p>
                        <a href="/product/{{$lp->id}}/detail" class="btn btn-danger btn-block">Detail</a>
                      </div>
                    </div>
              </div>
              @endforeach
          </div>
            </div>
        </div>


        <div>
            <div class="col-sm-12 other-page">
              <div class="container">
                <div class="row">
                   <div class="col-sm-7 mt-4">
                      <img src="{{asset('assets/image/undraw_online_shopping.svg')}}" style="width: 150px" alt="">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, officia, delectus saepe est eum inventore molestiae provident temporibus vel dolorem exercitationem optio adipisci rem, ipsum suscipit. Atque, minima doloribus. Quasi?</p>
                    </div>
                    <div class="col-sm-5 mt-4">
                      <img src="{{asset('assets/image/undraw_send_gift.svg')}}" style="width:150px" alt="">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, officia, delectus saepe est eum inventore molestiae provident temporibus vel dolorem exercitationem optio adipisci rem, ipsum suscipit. Atque, minima doloribus. Quasi?</p>
                    </div>
                  
                </div>
              </div>
            </div>

            <div class="col-sm-12 other-page-two">
                <div class="container">
                    <div class="row">
                      <div class="col-sm-5 mt-4 text-right">
                        <img src="{{asset('assets/image/undraw_shopping.svg')}}" style="width: 150px" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, officia, delectus saepe est eum inventore molestiae provident temporibus vel dolorem exercitationem optio adipisci rem, ipsum suscipit. Atque, minima doloribus. Quasi?</p>
                      </div>
                      <div class="col-sm-7 mt-4 text-right">
                        <img src="{{asset('assets/image/undraw_web_shopping.svg')}}" style="width:150px" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, officia, delectus saepe est eum inventore molestiae provident temporibus vel dolorem exercitationem optio adipisci rem, ipsum suscipit. Atque, minima doloribus. Quasi?</p>
                      </div>
                    
                    </div>
                </div>
            </div>
        </div>

      <div class="about" id="about">
          <div class="col-sm-12">
            <div class="header-about text-center mt-3">
              <h4>About</h4>
            </div>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-sm-6 about-image">
                      <img src="{{asset('assets/image/undraw_online_page.png')}}" alt="">
                    </div>
                    <div class="col-sm-6 about-text">
                      <div class="card " style="height:auto;">
                        <div class="card-body">
                          <h5 class="card-title">About Us</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis maiores esse sunt molestiae, eos illum quibusdam labore. Tempora porro eos quae fugit incidunt dolor non, harum est omnis animi libero.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quam animi vero quos ducimus culpa tempora voluptatibus aperiam porro numquam, in officia accusantium quaerat consequuntur quas est facere? Nemo, hic?
                          </p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
      </div>


@endsection


@section('footer')
<script>
  $(window).scroll(function(){
    $('nav').toggleClass('scrolled' , $(this).scrollTop() > 0);
  })
</script>

<script src="{{asset('assets/owl/dist/owl.carousel.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        loop:true,
        lazyLoad:true,
        autoplay:true,
    autoplayTimeout:3000,
        responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        800:{
          items:3,
          nav:false
        }
    }
      });
    })     
  </script>

@stop