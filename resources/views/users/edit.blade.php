@extends('layout')

@section('content')
    <h1 class="text-left">Editando usuario</h1>
    <br>
    @if(session()->has('info'))
        <div class="alert alert-success">{{session('info')}}</div>
    @endif
    <div class="form-group">
        <form method="post" action="{{route('users.update',$user->id)}}">
            {!! method_field('PUT') !!}
            @csrf
            <input class="form-control-sm" name="name" placeholder="Name ..." value="{{$user->name}}"><br>
            {!!$errors->first('name', '<small>:message</small>')!!}<br>
            <input class="form-control-sm" type="email" name="email"
                   value={{$user->email}}>
            <br>
            {!!$errors->first('email', '<small>:message</small><br>')!!}
            <button class="btn btn-primary">@lang('Update')</button>
        </form>
    </div>
@endsection