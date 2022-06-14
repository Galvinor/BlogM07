@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Post') }}</div>
                <form action="{{ route('posts.store', $user) }}" method="POST">
                    @csrf @method('POST')
                    <input name="title" class="form-control" type="text" placeholder="Título" required>
                    <input name="contents" class="form-control" type="text" placeholder="Descripción" required>
                    <input name="tag" class="form-control" type="text" placeholder="Etiquetas (Separar por comas)">
                    <input type="submit" value="CREAR" class=" btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
