@extends('layouts.admin_style')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
    @if (Session::has('update'))
    <div class="alert alert-success">{{Session::get('update')}}</div>
        
    @endif

    @if (Session::has('validation_error'))
    <div class="alert alert-danger">{{Session::get('validation_error')}}</div>
        
    @endif

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
        
    @endforeach
    
    <form action="{{route('update_user')}}" method="post">
        @csrf
       <input type="hidden" name="user_id" value="{{$result->id}}">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$result->name}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$result->email}}">
        </div>
        <div class="form-group">
            <label for="">isAdmin</label>
            <input type="text" name="isAdmin" class="form-control" value="{{$result->isAdmin}}">
        </div>
        <div class="form-group">
            <label for="">isPremium</label>
            <input type="text" name="isPremium" class="form-control" value="{{$result->isPremium}}">
        </div>
        
        
        <input type="submit" value="Update" class="btn btn-info">
       
        
    </form>
  
        
</div>

@endsection