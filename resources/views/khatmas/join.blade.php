@extends('layouts.app')

@section('content')
<div class="container full-height h-100">
 
            <div class="content">
                <i class="fa fa-book fa-5x" ></i>
                <div class="title ">
                    Will See
                </div> 
            </div> 

        <div class="row justify-content-center full-height h-100">
            @if (session('status'))
                <div class="alert alert-success full-height" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div> 

            @if(   $message == "Join the khatma" ) 
            <div class="row h-100 m-auto w-100 ">

                <form class="col-6  " action="/khatma/{{ $khatma->id }}" method="post">
                    @csrf
                    @method('PATCH')
                     <button class=" btn btn-success text-light btn-lg  w-100 ">
                        {{ $message ?? ''  }}
                    </button>
                </form>
            @else
                
                <div class="alert alert-danger text-center">
                    {{  $message ?? '' }}
                </div>    
           
            <div class="row h-100 m-auto w-100 ">
                
            @endif
                <div class="container col-6">
                    <a href="\" class=" btn btn-secondary text-light btn-lg  w-100 ">
                        Go back ahaha  
                    </a>
                </div>
        </div>

                {{  $wrong ?? '' }}
</div>

                
                 
                    
                
                </div>
                
@endsection
