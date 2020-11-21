@extends('layouts.bootstrap')

@section('content')

   <div class="container">
       @if (Session::has('update'))
       <div class="alert alert-success">{{Session::get('update')}}</div>
           
       @endif
        @foreach ($errors->all() as $error)
           <div class="alert alert-danger">{{$error}}</div>
       @endforeach 
        <div class="col-md-5">
            <img src="{{asset('photos/'.$data[0]->photo)}}" width="300px" height="300px" style="margin-top:30px">
        </div>
       <div class="col-md-5">
           <h1>{{$data[0]->title}}</h1>
           <h3>(Posted By:{{$data[0]->name}})</h3>
           <legend></legend>
           <p style="font-size:20px;">{{$data[0]->content}}</p>
       </div>
       <div class="col-md-1">
          <button class="btn btn-info" style="width:90px; font-size:20px;" data-toggle="modal" data-target="#myUpdate">Edit</button><br><br>
          <button class="btn btn-danger" style="width:90px; font-size:20px;" data-toggle="modal" data-target="#myDelete">Delete</button><br><br>
         <a href="{{route('home_page')}}"><button class="btn btn-sm btn-warning" style="width:90px; font-size:20px;">Back</button></a> 
       </div>

{{-- open delete box --}}
        <!-- The Modal -->
  <div class="modal" id="myDelete" style="width:250px; margin:0 auto; padding:0 auto;">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
            
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <p>Are You Suer For Delete</p>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <button class="btn btn-danger" style="width:100px; font-size:20px;" data-dismiss="modal">NO</button>
            <a href="{{url('delete_new/'.$data[0]->id)}}"><button class="btn btn-success" style="width:100px; font-size:20px;">Yes</button></a>
            
        </div>
  
        <!-- Modal footer -->
        
  
      </div>
    </div>
  </div>


    {{-- delete box --}}

    {{-- for edit --}}
     
    <!-- The Modal -->
  <div class="modal" id="myUpdate">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img src="{{asset('photos/'.$data[0]->photo)}}" style="width:100%; height:10%;">
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            
            <form action="{{route('update_new')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$data[0]->id}}">
                <div class="form-group">
                  
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$data[0]->title}}">
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="photo" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">content</label>
                    <input type="text" name="content" class="form-control" value="{{$data[0]->content}}">
                </div>
                
                
                <input type="submit" value="Update" class="btn btn-info">
            </form>
    
        </div>
  
        <!-- Modal footer -->
        
  
      </div>
    </div>
  </div>


   
    {{-- end edit --}}

   </div>
@endsection