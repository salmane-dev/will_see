@extends('layouts.app')

@section('content')
<div class="container full-height h-100">
    <div class="row justify-content-center full-height h-100">
            
                 @if (session('status'))
                        <div class="alert alert-success full-height" role="alert">
                            {{ session('status') }}
                        </div>
                @endif

                <a href="/khatma/create" class="btn btn-secondary m-5" >Add new </a>
    </div>
</div>
                <div class="container mt-5">

                    <div class="card border-dark m-5 d-flex" >
                        <div class="card-header d-flex justify-content-between">
                            KH name
                            <a href="/khatma/show" class=" text-right btn btn-secondary btn-sm " >Go to</a> 
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">Dark card title</h5>
                            <p class="card-text">Some quick exam c up the bulk of the card's content.</p>
                        </div>
                    </div>


                </div>
                
@endsection
