@extends('layouts.app')

@section('content')
<div class="container full-height h-100">
    <div class="row justify-content-center full-height h-100">
            
                 @if (session('status'))
                        <div class="alert alert-success full-height" role="alert">
                            {{ session('status') }}
                        </div>
                @endif

                <a href="/khatma/create" class="btn btn-secondary m-5 pr-4 pl-4 " >Add new </a>
                
               
               
    </div>
            <div class="row justify-content-center full-height h-100">
                @if($message ?? '')
                    <span class="alert alert-success p-3 center text-center"><strong>{{ $message ?? '' }}</strong></span>
                @endif 
            </div>
</div>
               
                <div class="container mt-5">
                @if($khatmas ?? '')
                @foreach($khatmas ?? '' as $khatma) 
                    <div class="card border-dark m-5 d-flex" >
                        <div class="card-header d-flex justify-content-between">
                           <strong><h4> {{ $khatma->name }} </h4></strong>
                            <a href="/khatma/{{ $khatma->id }}" class=" text-right btn btn-secondary btn-sm " >Go to</a> 
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">days : {{ $khatma->days }}</h5>
                            <h5 class="card-title">people :  {{ $khatma->peeps }}</h5>
                            <p class="card-text">Some quick exam c up the bulk of the card's content.</p>
                           
                            <div class=" d-flex justify-content-between">
                            <small class="card-text">by  :  {{  $khatma->user->name}}  </small>
                            <p class=" text-right  " > created at {{  $khatma->created_at }}</p> 
                            </div>

                          
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
                
@endsection
