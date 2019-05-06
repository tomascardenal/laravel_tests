@extends('layout')
@section('content')
    <h1>{{$user->name}}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Roles:</th>
            <td>
                @foreach($user->roles as $element)
                    {{$element->key}}
                @endforeach
            </td>
        </tr>
    </table>
    @can('edit', $user)
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Editar</a>
    @endcan
@endsection