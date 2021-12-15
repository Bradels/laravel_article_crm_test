


<form method="POST" action="/articles" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <h2> Create New Article </h2>
    <label for="title">Article Title</label>

    <input id="title" name="title" type="text" class="@error('title') is-invalid @enderror">

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="content">Article content</label>

    <input id="content" name="content" type="text" class="@error('content') is-invalid @enderror">

    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="image"> Article Image (optional)</label>

    <input type="file" name="image" class="form-control">

    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="submit">
</form>