@extends('parts.body')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            <img src="{{$post->image}}" alt="">
            <button href="{{route('posts.update', $post->id)}}">update</button>
        </div>
    </div>
</div>

@endsection