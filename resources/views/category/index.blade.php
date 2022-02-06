@extends('layout.apps')
@section('title' , 'Categories')
@section('content')
<div class="content">
    <h3>Categories</h3>
 

        <div class="table-categories">
    
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
                        <th scope="col">Icon</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $categories as $categorie )
                        <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $categorie->name }}</td>
                        <td>
                            <img src="{{asset('assets/image/icon/' .$categorie->icon)}}" alt="" style="width:40px;">
                        </td>
                        <td>
                           
                        
                        {{-- <a href="/categories/{{$categorie->id}}/detail" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a>  --}}
                        <a href="/categories/{{$categorie->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            
                        </td>
        
                    </tr>
                        <tr>
                        @endforeach
                    </tbody>
                    </table>
        
             
        
                </div>
        
        
 
    
   
    
</div>




      

@endsection