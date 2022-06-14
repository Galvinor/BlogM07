@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="d-flex" action="{{ route('searchRes') }}" method="GET">
                @csrf @method('GET')
                <input class="form-control" type="text" name="text" placeholder="Introdueix la teva cerca">
                <input class="btn btn-info" type="submit" value="BUSCAR">
            </form>
            <br>
            <div class="card">
                <div class="p-2 bg-blue-300">
                    @foreach ($posts as $post)
                        <div class="card">
                            <br>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->contents }}</p>

                            <h5>Tags:</h5>
                            <div class="d-flex" style="gap: 10px">
                                @foreach ($post->tags as $tag)
                                    <h4><span class="badge badge-info">{{ $tag->tag }}</span></h4>
                                @endforeach
                            </div>

                            <div style="gap:30px" class="d-flex">
                                <a href="{{ route('posts.edit', $post) }}"><button class="btn btn-primary">EDITAR</button></a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <input type="submit" value="ELIMINAR" class="btn btn-danger">
                                </form>
                            </div>
                            <hr>
                            <form action="{{ route('replies.store') }}" method="POST" class="form">
                                @csrf @method('POST')
                                <input class="form-control" type="hidden" name="postId" value="{{ $post->id }}">
                                <input class="form-control" name="reply" type="text" placeholder="Comentari" required><br>
                                <input type="submit" value="COMENTAR" class="btn btn-info">
                            </form>
                            <hr>
                            <h5>Comentaris:</h5>
                            @foreach ($replies as $reply)
                            @foreach ($users as $user)

                                @if ($reply->post_id ==$post->id)
                                @if ($reply->user_id ==$user->id)

                                <br>
                                <h4><span>{{__(' - ').$user->username.__(': ').$reply->reply }}</span></h4>
                                @endif
                                @endif
                            @endforeach
                            @endforeach

                            <br><br>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
