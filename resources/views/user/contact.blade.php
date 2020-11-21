@extends('layouts.bootstrap')

@section('content')
<div class="contaner">
    <div class="col-md-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.79020234646!2d95.90136958313794!3d16.83960980011405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1603959619484!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="col-md-4">
        <h1>Contact Form</h1>
        <form action="{{route('insert_contact')}}" method="post">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
                
            @endif

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message"  cols="30" rows="5"class="form-control"></textarea>
            </div>
            <input type="submit" value="save" class="btn btn-info">
        </form>
    </div>
</div>
@endsection