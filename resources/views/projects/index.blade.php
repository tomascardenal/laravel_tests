@extends('layout')
@section('title', 'Portfolio')

@section('content')
    <h1>Portfolio de proyectos</h1>
    @isset($projects)
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>@lang("Title")</th>
                    <th>@lang("Description")</th>
                    <th>@lang("Created")</th>
                    <th>@lang("Updated")</th>
                    <th>@lang("Actions")</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td scope="row">{{$project->id}}</td>
                        <td><a href="{{route('projects.show',$project->id)}}">
                                {{$project->title}}</a></td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->updated_at}}</td>
                        <td class="custom-control-inline m-auto"><a class="btn btn-info" href="{{route('projects.edit',$project->id)}}">Editar</a>
                            <form method="POST" action="{{route('projects.destroy',$project->id)}}">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td scope="row">No hay proyectos para mostrar</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    @else
        <ul>
            <li>No se ha encontrado el portfolio</li>
        </ul>
    @endisset
@endsection