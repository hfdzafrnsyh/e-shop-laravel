@extends('layout.app')
@section('content')

    <div class="cart-product">
        <div class="container">
          <div class="col-lg-12" style="margin-top:200px;margin-bottom:160px;">
            @forelse ($cart as $ct)
            <div class="row">
              <div class="col-sm-4">
                <img src="{{asset('assets/image/product/' .$ct->product_image)}}" alt="" style="width:100%">
                
                <form action="/product/cart/order/{{$ct->id}}" method="POST">
                  @method('delete')
                  @csrf
                  <input type="hidden" name="name_product" value="{{$ct->product_name}}">
                  <input type="hidden" name="price_product" value="{{$ct->product_price}}">
                  
                  <button type="submit" class="btn btn-danger btn-block mt-4" >
                      Pesan
                    </button>
                  </form> 
              </div>
              <div class="col-sm-7" style="margin-top:100px;">
                <h5>{{$ct->product_name}}</h5>
                <p>{{$ct->product_price}}</p>
              </div>
              <form action="/product/cart/{{ $ct->id }}" method="post"   style="margin-top:100px;">
                @method('delete')
                @csrf

                <button type="submit" class="btn btn-danger btn-circle btn-sm justify-content-end" onclick="return confirm('Remove?')"><i class="fas fa-trash "></i></button>
            </form>
            </div>
            @empty
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-4 text-center">
                      <i class="fas fa-cart-arrow-down fa-4x text-danger"></i>
                    </div>
                    <div class="col-sm-6 text-center">
                      <h4><u>Empty Cart</u></h4>
                    </div>
                  </div>
                </div>
            @endforelse
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

@stop