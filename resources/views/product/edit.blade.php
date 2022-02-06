@extends('layout.apps')
@section('title' , 'Edit Products')
@section('content')
<div class="content">
    <h3>Data Products</h3>


    <form action="/products/{{$products->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
               <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="name" value="{{$products->name}}" name="name" required id="name" class="form-control round-form @error('name') is-invalid @enderror" >
                                    @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
                    
               <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="price" value="{{$products->price}}" name="price" required id="price" class="form-control round-form @error('price') is-invalid @enderror" >
                                    @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
               <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="number" placeholder="stock" value="{{$products->stock}}" name="stock" required id="stock" class="form-control round-form @error('stock') is-invalid @enderror" >
                                    @error('stock')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
               <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="number" step="0.01" placeholder="rating" value="{{$products->rating}}" name="rating" required id="rating" class="form-control round-form @error('rating') is-invalid @enderror" >
                                    @error('rating')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
               <div class="form-group">
                                <div class="col-sm-12">
                                 <textarea name="description" id="description" placeholder="description" cols="20" rows="5" class="form-control round-form @error('description') is-invalid @enderror">
                                    {{$products->description}}
                                </textarea>
                                    @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                        
                        </div>
                    
                
                       
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                               
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" readonly value={{$products->category->name}}>
                                    </div>
    
                                    <div class="col-sm-6">
                                        <label for="disabledSelect" class="form-label">Categories</label>
                                        <select id="form-control" class="form-select" name="category_id">
                                         @foreach($categories as $category)
                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                        </select>
                                       </div>
                                    
                                </div>
                            </div>
                         </div>
                      

                         <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Image</label>
                            <div class="row">
                               
                                <div class="col-sm-6 text-center">
                                    <img src="{{asset('assets/image/product/' . $products->image)}}"  style="width:100px" alt="">
                                </div>
                               
                                <div class="col-sm-6">
                                    <input type="file" name="image" id="image" class="form-control round-form">
                                </div>
                               
                            </div>
                          </div>
              

                    <div class="text-center">
                        <a href="/products" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success text-center">Update</button>
                    </div>

        </form>

  
        
</div>



  

@endsection