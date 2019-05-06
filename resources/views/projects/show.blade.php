@extends('layout')
@section('title', 'Mostrando proyectos')
@section('content')
    @isset($project)
        <h1>{{$project->title}}</h1><br>
        <small>Creado en: {{$project->created_at}}</small>
        <p>{{$project->description}}</p>
    @else
        <h1>No se ha encontrado el proyecto que buscaba</h1>
    @endisset
@endsection