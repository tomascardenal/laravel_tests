@extends('layout')
@section('title', 'Editing project')

@section('content')
    <h1 class="text-left">Editando proyecto</h1>
    <br>
    <div class="form-group">
        <form method="post" action="{{route('projects.update',$project->id)}}">
            {!! method_field('PUT') !!}
            @csrf
            <input class="form-control-sm" name="title" placeholder="Título ..." value="{{$project->title}}"><br>
            {!!$errors->first('title', '<small>:message</small>')!!}<br>
            <textarea class="form-control" type="text" name="description"
                      rows="3">{{$project->description}}</textarea>
            <br>
            {!!$errors->first('description', '<small>:message</small><br>')!!}
            <button class="btn btn-primary">@lang('Update')</button>
        </form>
    </div>
@endsection
