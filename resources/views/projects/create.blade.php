@extends('layout')
@section('title', 'New project')

@section('content')
        <h1 class="text-left">Nuevo proyecto</h1>
    <br>
    <div class="form-group">
        @if(session()->has('projectstored'))
            <h2>{{session('projectstored')}}</h2><br>
        @endif
        <form method="post" action="{{route('projects.store')}}">
            @csrf
            <input class="form-control-sm" name="title" placeholder="Título ..." value="{{old('title')}}"><br>
            {!!$errors->first('title', '<small>:message</small>')!!}<br>
            <textarea class="form-control" type="text" name="description"
                      placeholder="Descripción del proyecto..."
                      value="{{old('description')}}" rows="3"></textarea>
            <br>
            <button class="btn btn-primary">@lang('Send')</button>
        </form>
    </div>
@endsection

