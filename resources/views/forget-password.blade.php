@extends('layout/layout-common')
@section('content')

    <h1> Forget Password </h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p style="color:red;">{{$error}} </p>
        @endforeach
    @endif

    @if(Session::has('error'))
        <p style="color:red;">{{Session::get('error')}}</p>
    @endif

    @if(Session::has('success'))
        <p style="color:green;">{{Session::get('success')}}</p>
    @endif

    <form action="{{ route('forgetPassword')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Enter Email">
        <br><br>
        <input type="submit" value="Forget Password">
        <br><br>
    </form>

    <a href="/"> Login </a>
    
@endsection
