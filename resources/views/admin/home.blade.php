@extends('parts.body')

@section('content')
<h1>La tua base operativa per i posts</h1>

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-3">
                <a href="{{route('admin.posts.show', $post->id, $categories)}}">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->description}}</p>
                    <img src="{{$post->image}}" alt="">
                </a>
                <form action='{{ route('admin.posts.destroy', $post->id) }}' method="POST">
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
                <button><a href="{{route('admin.posts.create')}}">Crea Nuovo Post</a></button>
    {{-- <button><a href="{{route('categories.create')}}">Crea Nuova Categoria</a></button> --}}
            </div>
        </div>
    </div>
</div>
@endsection

