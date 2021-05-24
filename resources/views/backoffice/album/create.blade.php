
@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="container">
        <h1 class="text-center my-5">Create Album</h1>
        <form action={{ route('albums.store') }} method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>