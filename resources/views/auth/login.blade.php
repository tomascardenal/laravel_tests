@extends('layout')
@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    <br>
    <form class="form-inline" method="POST" action="/login">
        @csrf
        <input class="form-control" type="email" name="email" placeholder="Email">
        <input class="form-control" type="password" name="password" placeholder="Password">
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@endsection
