@extends('layout.app')
@section('content')

<div class="productCategory">
    <div class="col-sm-12 mt-5 mb-5">
      <div class="header-product-lates text-center" style="padding-top:40px">
        <h4>{{$categories->name}}</h4>
      </div>
      <div class="row">
        @foreach( $products as $product)
        <div class="col-sm-3 product-card-lates">
          <div class="card" >
              <img src="{{asset('assets/image/product/' . $product->image)}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <h6>{{$product->rating}}<i class="fas fa-star text-warning"></i></h6>
                <p>Stock : {{$product->stock}}</p>
                <p class="card-text">{{$product->price}}</p>
                <a href="/product/{{$product->id}}/detail" class="btn btn-danger btn-block">Detail</a>
              </div>
            </div>
      </div>
      @endforeach
    </div>
    <div class="back-home text-center mt-5">
      <a href="/"><i class="fas fa-arrow-left fa-2x"></i></a>
  </div>
    </div>
</div>

@section('footer')
<script>
    $(window).scroll(function(){
      $('nav').toggleClass('scrolled' , $(this).scrollTop() > 0);
    })
  </script>
  
@stop