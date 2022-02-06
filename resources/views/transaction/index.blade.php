@extends('layout.apps')
@section('title' , 'Transaction')
@section('content')
<div class="content">
    <h3>Order</h3>
 
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
                        <th scope="col">Name Product</th>
                        <th scope="col">Name User</th>
                        <th scope="col">Email User</th>
                        <th scope="col">Income</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $transaction as $transac )
                        <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $transac->name }}</td>
                        <td>{{ $transac->name_user }}</td>
                        <td>{{ $transac->email_user }}</td>
                        <td>{{ $transac->income }}</td>
                     
                        <td>
                           
                        
                        <form action="/transaction/{{ $transac->id }}" method="post"  class="d-inline">
                            @method('delete')
                            @csrf
        
                            <button type="submit" class="btn btn-danger btn-circle btn-sm justify-content-end" onclick="return confirm('apakah anda yakin menghapus?')"><i class="fas fa-trash "></i></button>
                        </form>
                        </td>
        
                    </tr>
                        <tr>
                        @endforeach
                    </tbody>
                    </table>
        
             
        
                </div>
        
        
 
    
   
    
</div>



@endsection