@extends('layout')
@section('title', 'Contact')

@section('content')
    <h1>{{ __('Contact')}}</h1>
    @if(session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else
        <br>
        <form method="post" action="{{route('contact')}}">
            @csrf
            <input class="form-control-sm" name="name" placeholder="Nombre ..." value="{{old('name')}}"><br>
            {!!$errors->first('name', '<small>:message</small>')!!}<br>
            <input class="form-control-sm" type="email" name="email" placeholder="Email..."
                   value="{{old('email')}}"><br>
            {!!$errors->first('email', '<small>:message</small>')!!}<br>
            <input class="form-control-sm" name="subject" placeholder="Asunto..." value="{{old('subject')}}"><br>
            {!!$errors->first('subject', '<small>:message</small>')!!}<br>
            <textarea class="form-control-sm" name="content" rows="3" placeholder="Mensaje..."
                      value="{{old('content')}}"></textarea><br>
            {!!$errors->first('content', '<small>:message</small>')!!}<br>
            <button class="btn btn-primary">@lang('Send')</button>
        </form>

    @endif
@endsection