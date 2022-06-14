@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edició de Perfil') }}</div>

                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf @method('PUT')
                    <input name="username" class="form-control" type="text" placeholder="Nou Nom">
                    <input name="email" class="form-control" type="text" placeholder="Nou Email">
                    <input name="password" class="form-control" type="password" placeholder="Nou Password">
                    <input type="submit" value="ACTUALITZAR" class="btn btn-primary">
                </form>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
