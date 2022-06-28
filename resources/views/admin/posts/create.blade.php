@extends('parts.body')
@section('content')

<form action="{{ route('admin.posts.store') }}" method="POST" class="boot" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 row justify-content-center">
        <label for="title" class="col-sm-8 col-form-label">Title</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci un titolo" name="title">
        </div>
        <div class="col-sm-8">
            <label for="content" class="col-sm-4 col-form-label">content</label>
            <textarea name="content" type="text" cols="50" rows="10" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci la descrizione">
            </textarea>
        </div>
        <div class="col-sm-8">
            <label for="image" class="col-sm-4 col-form-label">Image: </label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        </div>
        <select name="category_id" id="category_id">
            <?php
              use App\Category;
              $categories = Category::all();
            ?>
            @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-warning"><strong>Save</strong></button>
</form>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>

@endsection