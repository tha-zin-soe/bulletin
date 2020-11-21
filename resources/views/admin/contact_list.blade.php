@extends('layouts.admin_style')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
  @if (Session::has('delete'))
  <div class="alert alert-danger">{{Session::get('delete')}}</div>
      
  @endif

  @if (Session::has('update'))
  <div class="alert alert-success">{{Session::get('update')}}</div>
      
  @endif
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>  
  @endforeach
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->message}}</td>
            <td>
             <a href="{{ url('update_contact/'.$item->id)}}" class="btn btn-info" >Edit</a>
              <a href="{{ url('delete_contact/'.$item->id)}}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
              
          @endforeach
          
          
          
        </tbody>
      </table>


      
    
</div>

@endsection