@extends('layout.apps')
@section('title' , 'Detail Products')
@section('content')


        <div class="content">
            <h3>Detail Order</h3>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Products</h6>
                </div>
                <div class="card-body">
                
                    <div class="col-sm-8">
                        <div class="text-detail-data text-center text-primary">
                            <h4>Name : <u>{{ $orderProduct->name_product }} </u></h4>
                            <h6>Price : {{$orderProduct->price_product}}</h6>
                            <h6>Name : {{$orderProduct->name_user}}</h6>
                            <h6>Email : {{$orderProduct->email_product}}</h6>
                            <h6>Phone : {{$orderProduct->phone_user}}</h6>
                            <h6>Address : {{$orderProduct->address}}</h6>
                        </div>
                    </div>

                </div>
              </div>

              <div class="link-detail-book text-center mt-5 mb-3">
                
                <a href="/order"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                </div>

        </div>
@endsection