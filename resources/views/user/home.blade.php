@extends('layouts.bootstrap')

@section('content')
<div class="jumbotron text-center">
    <h1>Home Page</h1>
    
  </div>
  
  <div class="container">
    <div class="row">
      
      @if (Session::has('delete'))
      <div class="alert alert-danger">{{Session::get('delete')}}</div>
          
      @endif
      @if (Session::has('error'))
      <div class="alert alert-danger">{{Session::get('error')}}</div>
          
      @endif
      @foreach ($data as $item)
      <div class="col-sm-4">
        <img src="{{asset('photos/'.$item->photo)}}" width="300px" height="250px" style="margin-top:30px" >
        <h3>{{$item->title}}</h3>
        
        <a href="{{url('look_newInfo/'.$item->id)}}"><button type="submit" class="btn btn-info">See More</button></a>
      </div> 
      @endforeach
      
    </div>
  </div>
@endsection