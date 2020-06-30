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
                    

<div class="container"> 
    <form action="/khatma" method="post">
        @csrf
            <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Khatma</h1>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 pl-0 mb-0"> Name </label>
                    <input id="name" 
                            type="text"
                            class="form-control @error('') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}" 
                            autocomplete="off" autofocus>
                            <small id="nameHelp" class="form-text text-muted">give it a name</small>   
                    @error('name')
                        <div class="container pl-0 text-danger">
                            <strong class="danger">{{ $message }}</strong>
                        </div>
                    @enderror
                    
                </div>
         
                <div class="form-group row">
                    <label for="peeps" class="col-md-4 pl-0 mb-0"> peeps </label>
                    <input id="peeps" 
                            type="number"
                            class="form-control @error('') is-invalid @enderror" 
                            name="peeps" value="{{ old('peeps') }}" 
                            autocomplete="off" autofocus>
                            <small id="peeps" class="form-text text-muted">How many people will join this khatma</small>   
                    @error('peeps')
                        <div class="container pl-0 text-danger">
                            <strong class="danger">{{ $message }}</strong>
                        </div>
                    @enderror
                    
                </div>
         
                <div class="form-group row">
                    <label for="days" class="col-md-4 pl-0 mb-0"> Days </label>
                    <input id="days" 
                            type="number"
                            class="form-control @error('') is-invalid @enderror" 
                            name="days" value="{{ old('days') }}" 
                            autocomplete="off" autofocus>
                            <small id="days" class="form-text text-muted">for how long</small>   
                    @error('days')
                        <div class="container pl-0 text-danger">
                            <strong class="danger">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group row form-check">
                  
                    <input type="hidden"
                            class="form-check-input active"
                            name="join" 
                            value="0">
                    
                    <input type="checkbox"
                            class="form-check-input active"
                            name="join"
                            id="join"
                            checked="checked"
                            value="1">
                    <label class="form-check-label active" for="join" >join the khatma</label>
                  
                    @error('join')
                    <div class="container pl-0 text-danger">
                        <strong class="danger">{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            <div class="row pt-4">
                <button class="btn btn-primary">Add New Post </button>
            </div>

            </div>
        </div>
    </form>
</div> 
 
 
                
@endsection
