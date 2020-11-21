@extends('layouts.admin_style')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
   
    <form action="{{route('contact_update')}}" method="post">
        @csrf
       <input type="hidden" name="contact_id" value="{{$data->id}}">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label for="">Message</label>
            <textarea name="message"  cols="30" rows="5" class="form-control">{{$data->message}}</textarea>
        </div>
        
        
        <input type="submit" value="Update" class="btn btn-info">
       <a href="{{route('contact_list')}}" class="btn btn-secondary float-right">Back</a>
        
    </form>
  
        
@endsection