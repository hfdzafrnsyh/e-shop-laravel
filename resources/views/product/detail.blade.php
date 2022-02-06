@extends('layout.apps')
@section('title' , 'Detail Products')
@section('content')


        <div class="content">
            <h3>Detail Product</h3>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Products</h6>
                </div>
                <div class="card-body">
                
                <div class="row">
                
                <div class="col-lg-6">
               
                
                <div class="text-detail-data text-center text-primary">
                    <h4>Name : <u>{{ $products->name }} </u></h4>
                   
                </div>

                <div class="data-detail-product text-center">
                    <h6>Price : {{ $products->price }}</h6>
                    <p>Stock : {{ $products->stock }}</p>
                    <h6>Rating : {{ $products->rating }}</h6>
                    <p>description : </p>
                    <p>{{ $products->description }}</p>
                   
                </div>

                </div>
               
                <div class="col-lg-6 text-center">
                <img src="{{ asset('assets/image/product/' .$products->image )}}" style="width:120px" alt="">
                </div>


                </div>
           

                </div>
              </div>

              <div class="link-detail-book text-center mt-5 mb-3">
                
                <a href="/products"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                </div>

        </div>
@endsection