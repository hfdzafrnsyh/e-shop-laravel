@extends('layout.apps')
@section('title' , 'Users')
@section('content')
<div class="content">
    <h3>Users</h3>
 
        <div class="table-categories">
    
            <div class="session">
                @if( session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>

            <a href="/exportuser" class="btn btn-success btn-sm mb-3" target="_blank">Export Excel</a>
       
  
        
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name </th>
                        <th scope="col">Email</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user )
                        <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <img src="{{asset('wp-kashop/user/image/' .$user->photo)}}" alt="" style="width:40px;">
                        </td>
                        <td>
                           
                        
                        <a href="/users/{{$user->id}}/detail" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a> 
                        <a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                            
                        </td>
        
                    </tr>
                        <tr>
                        @endforeach
                    </tbody>
                    </table>
        
             
        
                </div>
        
        
 
    
   
    
</div>





@endsection