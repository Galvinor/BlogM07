@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edición de Post') }}</div>

                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf @method('PUT')
                    <input name="title" class="form-control" type="text" value="{{ $post->title }}" placeholder="Título">
                    <input name="contents" class="form-control" type="text" value="{{ $post->contents }}" placeholder="Descripción">
                    <input type="submit" value="ACTUALIZAR" class="btn btn-primary">
                </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
