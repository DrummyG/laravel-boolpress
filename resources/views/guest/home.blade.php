@extends('parts.body')

@section('content')
<h1>La tua base operativa per i posts</h1>

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3">
                <a href="{{route('posts.show', $post->id)}}">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->description}}</p>
                </a>
                <form action='{{ route('posts.destroy', $post->id) }}' method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-2">Elimina</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <button><a href="{{route('posts.create')}}">Crea Nuovo Post</a></button>
    {{-- <button><a href="{{route('categories.create')}}">Crea Nuova Categoria</a></button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
