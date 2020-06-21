@extends('layouts.app')

@section('content')
<div class="container full-height h-100">
    <div class="row justify-content-center full-height h-100">
            
                 @if (session('status'))
                        <div class="alert alert-success full-height" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
    </div>
</div>
                <div class="container mt-5">
               
                    <div class="card border-dark m-5 d-flex">
                        <div class="card-header d-flex justify-content-between">
                            <strong><h4> {{ $khatma->name }} </h4></strong>
                            <div class=" ">
                                <a href="#" class=" btn btn-secondary ">Edit</a>
                                <a href="#" class=" btn btn-danger ">Delete</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <h5 class="card-title">days : {{ $khatma->days }}</h5>
                            <h5 class="card-title">people :  {{ $khatma->peeps }}</h5>
                            <p class="card-text">Some quick exam c up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-dark">
                            <div class="container bg-light p-2 m-1 d-flex justify-content-between  align-items-baseline"> 
                                <span><i class="fa fa-check fa-lg" ></i></span> <strong>from 5 to 15 </strong>
                                    <div>
                                        <a href="#">
                                            <img class="rounded-circle w-100" style="max-width:40px;" src="https://instagram.frba2-2.fna.fbcdn.net/v/t51.2885-19/s150x150/51221666_2348568452030815_2096770005608693760_n.jpg?_nc_ht=instagram.frba2-2.fna.fbcdn.net&_nc_ohc=DvV2RgvokLUAX9tI-fa&oh=514c19a22f2622489018226420c21f3a&oe=5F19EFD9" alt="this is crazy">
                                            <h6>saido</h6>
                                        </a>
                                    </div>
                            </div>    
                            <div class="container bg-light p-2 m-1 d-flex justify-content-between  align-items-baseline"> 
                                <span><i class="fa fa-times fa-lg" ></i></span> <strong>from 5 to 15 </strong>  <a href="#"><img class="rounded-circle w-100" style="max-width:40px;" src="https://instagram.frba2-2.fna.fbcdn.net/v/t51.2885-19/s150x150/51221666_2348568452030815_2096770005608693760_n.jpg?_nc_ht=instagram.frba2-2.fna.fbcdn.net&_nc_ohc=DvV2RgvokLUAX9tI-fa&oh=514c19a22f2622489018226420c21f3a&oe=5F19EFD9" alt="this is crazy"> </a>
                            </div>
                        </div>
                    </div>
              
                </div>
                
@endsection
