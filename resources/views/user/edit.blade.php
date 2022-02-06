@extends('layout.apps')
@section('title' , 'Edit Users')
@section('content')


        <div class="content">
            <h3>Edit User</h3>
            
            <form action="/users/{{$users->id}}" method="post" enctype="multipart/form-data">
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
                            
                          
             
        
                            <div class="text-center">
                                <a href="/users" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left fa-2x"></i></a>
                                <button type="submit" class="btn btn-success text-center btn-sm">Update</button>
                            </div>
        
                </form>  
          

        </div>
@endsection