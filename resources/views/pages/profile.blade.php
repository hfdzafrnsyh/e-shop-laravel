@extends('layout.app')
@section('content')

<div class="productCategory">
    <div class="col-sm-12 mt-5 mb-5">
            <h4 class="text-center mt-5 mb-2">Profile</h4>
            <div class="container">
                <div class="col-sm-12">

                    
    <form action="/user/{{$users->username}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
   
                <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Photo</label>
                            <div class="row">
                               
                                <div class="col-sm-6 text-center">
                                    <img src="{{asset('wp-kashop/user/image/' .$users->photo)}}" class="rounded-circle" style="width:250px" alt="">
                                </div>
                               
                                <div class="col-sm-6 mt-5">
                                    <input type="file" name="image" id="image" class="form-control round-form">
                                </div>
                               
                            </div>
                          </div>
                          
                     <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="name" value="{{$users->name}}" name="name" required id="name" class="form-control round-form @error('name') is-invalid @enderror" >
                                @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="email" value="{{$users->email}}" readonly name="email" required id="email" class="form-control round-form @error('email') is-invalid @enderror" >
                                @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                         <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="username" value="{{$users->username}}" name="username" required id="username" class="form-control round-form @error('username') is-invalid @enderror" >
                                @error('username')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                         <label for="username" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="phone" value="{{$users->phone}}" name="phone" required id="phone" class="form-control round-form @error('phone') is-invalid @enderror" >
                                @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                         <label for="username" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="address" value="{{$users->address}}" name="address" required id="address" class="form-control round-form @error('address') is-invalid @enderror" >
                                @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                    
                    </div>
     

                    <div class="text-center">
                        <a href="/" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left fa-2x"></i></a>
                        <button type="submit" class="btn btn-success text-center btn-sm">Update</button>
                    </div>

        </form>
                </div>
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