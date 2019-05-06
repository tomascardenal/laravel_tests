@extends('layout')
@section('title', 'Portfolio')

@section('content')
    <h1>Usuarios de LaraTest</h1>
    @isset($users)
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>@lang("Name")</th>
                    <th>@lang("Email")</th>
                    <th>@lang("Phone")</th>
                    <th>@lang("Role")</th>
                    <th>@lang("Created")</th>
                    <th>@lang("Updated")</th>
                    <th>@lang("Acciones")</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td scope="row">{{$user->id}}</td>
                        <td><a href="{{route('users.show',$user->id)}}">
                                {{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            {{$user->roles->pluck('name')->implode(" | ")}}
                        </td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td class="custom-control-inline m-auto"><a class="btn btn-info" href="{{route('users.edit',$user->id)}}">Editar</a>
                            <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row">No hay usuarios para mostrar</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    @else
        <ul>
            <li>No se han encontrado usuarios</li>
        </ul>
    @endisset
@endsection