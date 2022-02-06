@extends('layout.apps')
@section('title' , 'Order Product')
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $orderProduct as $order )
                        <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $order->name_product }}</td>
                        <td>{{ $order->name_user }}</td>
                        <td>{{ $order->email_user }}</td>
                        <td>{{ $order->phone_user }}</td>
                     
                        <td>
                           
                        
                        <a href="/order/{{$order->id}}/detail" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a> 
                        {{-- <a href="/order/{{$order->id}}" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check-circle"></i></a>  --}}
                        <form action="/order/{{ $order->id }}" method="post"  class="d-inline">
                            @method('delete')
                            @csrf
        
                            <button type="submit" class="btn btn-success btn-circle btn-sm justify-content-end" onclick="return confirm('apakah anda yakin selesai?')"><i class="fas fa-check-circle "></i></button>
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