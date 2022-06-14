@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('El teu perfil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="card">
                    <span>Nom: {{$user->username}}</span>
                    <span>Email: {{$user->email}}</span>
                    <span>Rol: {{$user->role->role}}</span>
                </div>
                <br>
                <div>
                    <a href="{{ route('eProfile') }}"><button class="btn btn-primary">Administrar Perfil</button></a>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
