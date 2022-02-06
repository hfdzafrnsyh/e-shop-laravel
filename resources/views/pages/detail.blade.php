@extends('layout.app')
@section('content')


    <div class="col-sm-12 detail-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 detail-product-image">
                    <img src="{{asset('assets/image/product/' .$products->image)}}" alt="" style="width:100%;">

                       <form action="/product/cart/create" method="POST">
                        @csrf
                        <input type="hidden" name="product_name" value="{{$products->name}}">
                        <input type="hidden" name="product_price" value="{{$products->price}}">
                        <input type="hidden" name="product_image" value="{{$products->image}}">
                        <button type="submit" class="btn btn-danger btn-block mt-4" >
                            <i class="fas fa-cart-plus"></i>
                          </button>
                        </form> 

                      <button type="button" class="btn btn-danger btn-block mt-4" data-toggle="modal" data-target="#exampleModal">
                        Pesan
                      </button>
                </div>
                <div class="col-sm-6 text-center detail-product-other">
                    <h4>Name : <u>{{$products->name}}</u></h4>
                    <h6>{{$products->rating}}<i class="fas fa-star text-warning"></i></h6>
                    <p>Stock : {{$products->stock}}</p>
                    <h5>Price : {{$products->price}}</h5>
                    <p>{{$products->description}}</p>
                </div>
            </div>
            <div class="back-home text-center mt-5">
                <a href="/" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left fa-2x"></i></a>
                
            </div>
          
            <div class="comment-user">
                <div class="btn-comment text-center mt-2">
                    <button type="button" class="btn btn-primary" id="btn-comment-utama">Comment</button>
                </div>
                <form action="/comment/create" method="POST" id="comment-utama" style="display:none;" class="mt-2 ml-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$products->id}}">
                    <input type="hidden" name="parent_id" value="0">
                   <textarea name="content"  class="form-control" rows="5" placeholder="Comment..." required></textarea>
                   <button type="submit" class="btn btn-primary mt-2">Send</button>
               </form>
               <hr>
               @foreach($products->comment()->where('parent_id' , 0)->orderBy('created_at' , 'desc')->get() as $comment)
               <div class="dropdown-item d-flex align-items-center" >
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <img src="{{asset('wp-kashop/user/image/' . $comment->user->photo )}}"  class="rounded-circle" style="width:50px" alt="">
                    </div>
                </div>
                <div>
                 <div class="small text-gray-500">{{$comment->created_at->diffForHumans()}}</div>
                    <span class="font-weight-bold">@<i>{{$comment->user->username}}</i></span>
                    <span class="font-weight">{{$comment->content}}</span>
                    <span class="text-primary" id="reply-comment" style="cursor:pointer;">Reply</span>
                    <form action="/comment/create" style="display:none;padding-top:5px;" method="POST" id="comment-child">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$products->id}}">
                        <input type="hidden" name="parent_id" value="{{$comment->id}}">
                        <input type="text" name="content" class="form-control" required>
                        <input type="submit" class="btn btn-primary btn-sm" value="Send"> 
                    </form>
                    <br/>
                    @foreach($comment->childComment as $childs)
                    <div class="dropdown-item d-flex align-items-center" >
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <img src="{{asset('wp-kashop/user/image/' . $childs->user->photo )}}"  class="rounded-circle" style="width:50px" alt="">
                            </div>
                        </div>
                        <div>
                         <div class="small text-gray-500">{{$childs->created_at->diffForHumans()}}</div>
                            <span class="font-weight-bold">@<i>{{$childs->user->username}}</i></span>
                            <span class="font-weight">{{$childs->content}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                    </div>
               @endforeach
            </div>
        </div>
    </div>




    @guest
    @if(Route::has('login'))
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-purples">
            <div class="modal-header">
              <h5 class="modal-title text-white" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center text-white">
               
                <div class="container">
                     <!-- Outer Row -->
                    <div class="row justify-content-center">
          
                       <div class="col-lg-12">
                          <div class="p-5">
                    
                            <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-group">
   
                                  <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email..">
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                           
                        
                        </div>
                      <div class="form-group">
                              
                                  <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
  
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              
                          </div>
                
                      
                      <button type="submit" class="btn btn-danger btn-user btn-block">
                        Login
                      </button>
                      <hr>
                    
                    </form>
                    <hr>
                    <!-- <div class="text-center ">
                    @if (Route::has('password.request'))
                    <a class="small text-primary" href="{{ route('password.request') }}">Forgot Password?</a>
                          @endif
                      
                    </div> -->
                    <div class="text-center">
                      <a class="small text-white" href="/register">Create an Account!</a>
                        </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-default text-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
              
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      
    @endif
    @else
    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-purples">
                    <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="/product/order" method="post">
                            @method('post')
                            @csrf
                                      <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" placeholder="name product" readonly value={{$products->name}} name="name_product" required id="name_product" class="form-control round-form @error('name_product') is-invalid @enderror" >
                                                        @error('name_product')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            
                                            </div>
                                      <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" placeholder="Price" readonly value={{$products->price}} name="price_product" required id="price_product" class="form-control round-form @error('price_product') is-invalid @enderror" >
                                                        @error('price_product')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            
                                            </div>
                                
                                      <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="text" placeholder="Your Name" readonly value={{Auth::user()->name}} name="name_user" required id="name_user" class="form-control round-form @error('name_user') is-invalid @enderror" >
                                                        @error('name_user')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            
                                            </div>
                                      <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <input type="email" placeholder="Your Email" readonly value={{Auth::user()->email}} name="email_user" required id="email_user" class="form-control round-form @error('email_user') is-invalid @enderror" >
                                                        @error('email_user')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                </div>
                                            
                                            </div>
                                
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" placeholder="Your Phone" name="phone_user" required id="phone_user" value={{Auth::user()->phone}} class="form-control round-form @error('phone_user') is-invalid @enderror" >
                                                    @error('phone_user')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                             <textarea name="address" id="address" placeholder="Address" rows="5" class="form-control round-form @error('address') is-invalid @enderror">{{Auth::user()->address}}</textarea>
                                                @error('address')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        </div>
                                    
                                    </div>
            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Pesan</button>
                                        </div>
                
                            </form>
                    </div>
                </div>
                </div>
            </div>
    @endguest
@endsection

@section('footer')
<script>
    $(window).scroll(function(){
      $('nav').toggleClass('scrolled' , $(this).scrollTop() > 0);
    })
  </script>
  <script>
      $(document).ready(function(){
        $('#btn-comment-utama').click(function(){
            $('#comment-utama').show();
        })

        $('#reply-comment').click(function(){
            $('#comment-child').show();
        })
      });
  </script>
@stop