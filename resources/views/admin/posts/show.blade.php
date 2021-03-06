@extends('parts.body')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            <img src="{{$post->image}}" alt="">
            <button href="{{route('admin.posts.update', $post->id)}}">update</button>
        </div>
    </div>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>

@endsection