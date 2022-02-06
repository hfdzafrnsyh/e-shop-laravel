@extends('layout.app')
@section('content')

<div class="password-user">
    <div class="col-sm-12 mt-5 mb-5">
            <h4 class="text-center mt-5 mb-2">Password</h4>
            <div class="container">
                <div class="col-sm-12 password-form">

                    
    <form action="/user/{{$users->username}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
   
                     <div class="form-group row">
                        <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" placeholder="Old Password"  name="old_password" required id="old_password" class="form-control round-form @error('old_password') is-invalid @enderror" >
                                @error('old_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" placeholder="New Password" name="new_password" required id="new_password" class="form-control round-form @error('new_password') is-invalid @enderror" >
                                @error('new_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>
                     <div class="form-group row">
                         <label for="username" class="col-sm-2 col-form-label">Repeat Password</label>
                            <div class="col-sm-10">
                                <input type="password" placeholder="Repeat Password"  name="repeat_password" required id="repeat_password" class="form-control round-form @error('repeat_password') is-invalid @enderror" >
                                @error('repeat_password')
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