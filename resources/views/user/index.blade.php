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
            <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
                        Import from Excel
                </button> --}}
  
  
        
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

{{-- 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlFile1">Input File</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}



@endsection