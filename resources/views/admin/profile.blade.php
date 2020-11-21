@extends('layouts.admin_style')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
    @if (Session::has('result'))
    <div class="alert alert-success">
        {{Session::get('result')}}
    </div>   
    @endif

    @if (Session::has('password'))
    <div class="alert alert-danger">
        {{Session::get('password')}}
    </div>   
    @endif
    <form action="{{route('update_admin_profile')}}" method="post">
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
                
                <form action="{{route('admin_change_password')}}" method="post">
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
                        <input type="password" name="con_pwd" class="form-control" placeholder="Retype password">
                    </div>
                    
                    
                    <input type="submit" value="Change Password" class="btn btn-info">
                </form>
        
            </div>
      
            <!-- Modal footer -->

@endsection