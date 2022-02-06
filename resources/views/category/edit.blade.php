@extends('layout.apps')
@section('title' , 'Edit Categories')
@section('content')
<div class="content">
    <h3>Data Categories</h3>


    <form action="/categories/{{$categories->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
               <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="name" value="{{$categories->name}}" name="name" required id="name" class="form-control round-form @error('name') is-invalid @enderror" >
                                    @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
                    
             
                      

                         <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Image</label>
                            <div class="row">
                               
                                <div class="col-sm-6 text-center">
                                    <img src="{{asset('assets/image/icon/' . $categories->icon)}}"  style="width:100px" alt="">
                                </div>
                               
                                <div class="col-sm-6">
                                    <input type="file" name="image" id="image" class="form-control round-form">
                                </div>
                               
                            </div>
                          </div>
              

                    <div class="text-center">
                        <a href="/categories" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success text-center">Update</button>
                    </div>

        </form>

  
        
</div>



  

@endsection