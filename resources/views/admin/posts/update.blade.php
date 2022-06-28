@extends('parts.body')

@section('content')
<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" class="boot">
    @csrf
    @method('PUT')
    <div class="mb-3 row justify-content-center">
        <label for="title" class="col-sm-8 col-form-label">Title</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>

        <div class="col-sm-8">
            <label for="description" class="col-sm-4">Description</label>
            <textarea name="description" cols="50" rows="10" type="text" class="form-control" id="description" value="{{$post->description}}">{{$post->description}}
        </textarea>
        </div>

        <div class="col-sm-8">
            <label for="category_id" class="col-sm-4 col-form-label">Select category: </label>
            <select type="select" class="form-control" id="category_id" name="category_id">
                <?php
              use App\Category;
              $categories = Category::all();
            ?>
                @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->id}}</option>
                @endforeach
            </select>

        </div>

        <div class="col-sm-8">
            <label for="image" class="col-sm-4 col-form-label">Image: </label>
            <input type="text" class="form-control" id="image" name="image" value="{{$post->thumb}}">
        </div>
    </div>
    <button class="btn btn-warning"><strong>Modifica</strong></button>
</form>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
@endsection