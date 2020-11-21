@extends('layouts.admin_style')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
  @if (Session::has('delete'))
  <div class="alert alert-danger">{{Session::get('delete')}}</div>
      
  @endif
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Name</th>
            <th>Email</th>
            <th scope="col">isAdmin</th>
            <th scope="col">isPremium</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->isAdmin}}</td>
          <td>{{$item->isPremium}}</td>
          <td>
            <a href="{{ url('user_update/'.$item->id)}}" class="btn btn-info">Edit</a>
            <a href="{{url('delete_premium/'.$item->id)}}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
          @endforeach
          
          
        </tbody>
      </table>
</div>

@endsection