@extends('layouts.app')

@section('content')
<div class="container full-height h-100">
    <div class="row justify-content-center full-height h-100">
            
                 @if ( session('status')) 
                        <div class="alert alert-success full-height" role="alert">
                            {{  session('status')  }}
                        </div>
                @endif
  
                @if( $message ?? '' )
                    <div class="alert alert-success">
                        {{ $message ?? '' }}
                    </div>
                @endif
              
                @if(Session::has('msg'))
                    <div class="alert alert-danger">
                        {{ Session('msg') ?? '' }}
                    </div>
                @endif

    </div>
</div>
                <div class="container mt-5">
               
                    <div class="card border-dark m-5 d-flex">
                        <div class="card-header d-flex justify-content-between ">
                            <strong><h4> {{ $khatma->name ?? '' }} </h4></strong>
                            
                            <div class=" d-flex">

                                <div class="container pr-1 pl-0">
                                    <a href="../" class="btn btn-secondary">Back</a>
                                </div>
                              
                                <div class="container pr-1 pl-0">
                                    <a href="#" class=" btn btn-success ">Edit</a>
                                </div>
                              
                                <form action="/khatma/{{ $khatma->id ?? '' }}" method="post" class="container pr-1 pl-0">
                                @method('DELETE')
                                @csrf
                                    <button class="btn btn-danger ">Delete</button>
                                </form>

                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">days : {{ $khatma->days ?? '' }}</h5>
                            <h5 class="card-title">people :  {{ $khatma->peeps ?? '' }}</h5> 
                            <p class="card-text">Some quick exam c up the bulk of the card's content.</p>
                        </div>
                        
                        <div class="container">
                            <hr>
                        </div>

                        <div class="card-body text-dark">
                            @php( $share = 0 )
                            @php( $co = 0 )
                            @php( $name = "send" )

                            @for( $i = 0 ; $i < $khatma->peeps ?? '' ; $i++)
                                    <div class="row container rounded bg-light pr-2 pl-2 m-1 d-flex justify-content-between align-items-center "> 
                                        <input type="checkbox" data-toggle="toggle" data-on="Yup" data-off="Nope" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm">
                                              
                                        <strong class="col-5">from {{ round($share + 1) }} to {{   $share  = $share + 60/$khatma->peeps ?? '' }} </strong>
                                       <div class="col-3 text-center center">
                                            
                                           @if( $i  <  $khatma->khatmas_users->count())
                                                <a href="#" class="kh-person-info">
                                                   <img class="rounded-circle pt-1 w-100" style="max-width:40px;" src="https://scontent-sin6-1.cdninstagram.com/v/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg?_nc_ht=scontent-sin6-1.cdninstagram.com&_nc_cat=1&_nc_ohc=OobJQIfveTAAX_zPkU7&oh=464f769fc2eaf92067db83f1c32e9c6f&oe=5F1F8A0F&ig_cache_key=YW5vbnltb3VzX3Byb2ZpbGVfcGlj.2" alt="this is crazy">
                                                   <h6 class=" "> {{ $khatma->khatmas_users[$i]->name ?? " send"   }}</h6>
                                               </a>
                                           @else
                                               <a href="#" class="kh-person-info">
                                                   <i class="fa fa-plus p-2 pl-2 pr-2 bg-info text-light rounded-circle m-1 fa-1x " ></i>
                                                   <h6 class=""> send </h6>
                                               </a>
                                           @endif 
                                       @php( $co++ )
                                       </div>
                                   </div>
                           @endfor
                        </div>
                    </div>
                </div>
                
@endsection
