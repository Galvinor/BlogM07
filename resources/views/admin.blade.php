@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('Administrar Posts') }}</div>
            <div class="card">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->contents}}</td>
                            <td><a href="{{ route('posts.edit', $post) }}"><button class="btn btn-primary">EDITAR</button></a></td>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf @method('DELETE')
                                <td><input type="submit" value="ELIMINAR" class="btn btn-danger"></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br><br>
            <div class="card-header">{{ __('Administrar Usuarios') }}</div>
            <div class="card">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="{{ route('users.edit', $user) }}"><button class="btn btn-primary">Editar</button></a></td>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf @method('DELETE')
                                <td><input type="submit" value="ELIMINAR" class="btn btn-danger"></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
