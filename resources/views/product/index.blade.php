@extends('layout.apps')
@section('title' , 'Products')
@section('content')
<div class="content">
    <h3>Products</h3>
 
        <div class="table-products">
    

            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
                Add Product
                </button>

                     <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#importModal">
                        Import from Excel
                </button>
  

            <div class="session">
                @if( session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name </th>
                        <th scope="col">Price</th> 
                        <th scope="col">Stock</th> 
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $product )
                        <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <img src="{{asset('assets/image/product/' .$product->image)}}" alt="" style="width:40px;">
                        </td>
                        <td>
                           
                        
                        <a href="/products/{{$product->id}}/detail" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a> 
                        <a href="/products/{{$product->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                  
                            <form action="/products/{{ $product->id }}" method="post"  class="d-inline">
                                @method('delete')
                                @csrf
            
                                <button type="submit" class="btn btn-danger btn-circle btn-sm justify-content-end" onclick="return confirm('apakah anda yakin hapus?')"><i class="fas fa-trash "></i></button>
                            </form>
                        </td>
        
                    </tr>
                        <tr>
                        @endforeach
                    </tbody>
                    </table>
        
              <div class="pagination justify-content-center">
                    {{$products->links("pagination::bootstrap-4")}}
                    </div>
            
        
                </div>
        
        
     
</div>



      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <form action="/products/create" method="post" enctype="multipart/form-data">
              @method('post')
              @csrf
                     <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="text" placeholder="name" name="name" required id="name" class="form-control round-form @error('name') is-invalid @enderror" >
                                          @error('name')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                  @enderror
                                  </div>
                              
                              </div>
                          
                     <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="text" placeholder="price" name="price" required id="price" class="form-control round-form @error('price') is-invalid @enderror" >
                                          @error('price')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                  @enderror
                                  </div>
                              
                              </div>
                     <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="number" placeholder="stock" name="stock" required id="stock" class="form-control round-form @error('stock') is-invalid @enderror" >
                                          @error('stock')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                  @enderror
                                  </div>
                              
                              </div>
                     <div class="form-group">
                                      <div class="col-sm-12">
                                          <input type="number" step="0.01" placeholder="rating" name="rating" required id="rating" class="form-control round-form @error('rating') is-invalid @enderror" >
                                          @error('rating')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                  @enderror
                                  </div>
                              
                              </div>
                     <div class="form-group">
                                      <div class="col-sm-12">
                                       <textarea name="description" id="description" placeholder="description" cols="20" rows="5" class="form-control round-form @error('description') is-invalid @enderror"></textarea>
                                          @error('description')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                                  @enderror
                                  </div>
                              
                              </div>
                          
                      
                             
                              <div class="form-group">
                                <div class="col-sm-12">
                                 <label for="disabledSelect" class="form-label">Categories</label>
                                 <select id="form-control" class="form-select" name="category_id">
                                  @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                 </select>
                                </div>
                               </div>
                            

                               <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Image</label>
                                <div class="col-sm-12">
                                    <input type="file" name="image" id="image" class="form-control round-form">
                                </div>
                                </div>
                    
 
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                          </div>
  
              </form>
        </div>
       
      </div>
    </div>
  </div>


  
  <!-- Modal -->
  <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/importproduct" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlFile1">Input File</label>
                  <input type="file" name="file" class="form-control-file" required id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
        </div>
     
      </div>
    </div>
  </div>


@endsection