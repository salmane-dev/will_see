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
        <a href="/khatma/create" class="btn btn-secondary m-3 pr-4 pl-4 " >Add new </a>
    </div>

        <div class="row justify-content-center full-height h-100">
            @if( session()->has('message'))
                <div class="alert alert-info btn btn-info ">
                    {{ session()->get('message') }}
                </div>
            @endif 
        </div>
</div>

                
                 
                    
                
                </div>
                
@endsection
