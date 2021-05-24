@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container">
        <h1 class="text-center my-5">Edit Photo</h1>
        <form action={{ route('photos.update', $photo->id) }} method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value={{ $photo->nom }}>
            </div>
            <div class="mb-3">
                <label class="form-label">Lien</label>
                <input type="file" class="form-control" name="lien">
            </div>
            <div class="mb-3">
                <label class="form-label">Categorie</label>
                <select name="categorie" class="form-control">
                    <option value={{ $photo->categorie }}>{{ $photo->categorie }}</option>
                    <option value="item1">Item 1</option>
                    <option value="item2">Item 2</option>
                    <option value="item3">Item 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" cols="30" rows="10">{{ $photo->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Album</label>
                <select name="album_id" class="form-control">
                    @foreach ($albums as $album)
                        <option value={{ $album->id }}>{{ $album->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Do