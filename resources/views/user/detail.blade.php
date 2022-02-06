@extends('layout.apps')
@section('title' , 'Detail Users')
@section('content')


        <div class="content">
            <h3>Detail Users</h3>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Users</h6>
                </div>
                <div class="card-body">
                
                <div class="row">
                
                <div class="col-lg-6">
               
                
                <div class="text-detail-data text-center text-primary">
                    <h4>Name : <u>{{ $users->name }} </u></h4>
                   
                </div>

                <div class="data-detail-product text-center">
                    <h6>Email : {{ $users->email }}</h6>
                </div>

                </div>
               
                <div class="col-lg-6 text-center">
                <img src="{{ asset('wp-kashop/user/image/' .$users->photo )}}" style="width:120px" alt="">
                </div>


                </div>
           

                </div>
              </div>

              <div class="link-detail-book text-center mt-5 mb-3">
                
                <a href="/users"><i class="fas fa-arrow-alt-circle-left fa-2x"></i></a>

                </div>

        </div>
@endsection