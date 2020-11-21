@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <div class="col-md-7">
<legend>User Account</legend>
@if (Session::has('success'))
 <div class="alert alert-success">
   {{Session::get('success')}}
 </div>
    
@endif
@if (Session::has('update_success'))
 <div class="alert alert-success">
   {{Session::get('update_success')}}
 </div>
    
@endif

@if (Session::has('password'))
 <div class="alert alert-danger">
   {{Session::get('password')}}
 </div>
    
@endif
@if (Session::has('password_success'))
 <div class="alert alert-success">
   {{Session::get('password_success')}}
 </div>
    
@endif



@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach

        <form action="{{ route('update_account')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$data->id}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{$data->email}}">
            </div>
            <a href="" data-toggle="modal" data-target="#myPassword" >change password</a><br><br>
            
            <input type="submit" value="Change Account Info" class="btn btn-info">
        </form>

    </div>
    <div class="col-md-3"></div>

    <div class="col-md-2">
      
        <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   Add New
  </button>
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          
        
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1>Create New</h1>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
           
            <form action="{{route('insert_new')}}" method="post"enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="name">New Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New contact</label>
                    <input type="text" name="content" class="form-control">
                </div>
                
                
                <input type="submit" value="save" class="btn btn-info">
            </form>
    
        </div>
  
        <!-- Modal footer -->
        
  
      </div>
    </div>
  </div>

    </div> {{--  col col-md-2 --}}

    {{-- for change password --}}
    <!-- The Modal -->
  <div class="modal" id="myPassword">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1>Change Password</h1>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            
            <form action="{{route('user_change_password')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" name="old_pwd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" name="new_pwd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="con_pwd" class="form-control">
                </div>
                
                
                <input type="submit" value="Change Password" class="btn btn-info">
            </form>
    
        </div>
  
        <!-- Modal footer -->
        
  
      </div>
    </div>
  </div>


    {{-- close chage password --}}

</div>

@endsection