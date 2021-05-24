@extends('layouts.app')

@section('content')

@include('partials.navbar')


<section class="container">
    <h1 class="text-center my-5">Albums</h1>
    <a class="btn btn-success" href={{ route("albums.create") }}>Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <th scope="row">{{ $album->id }}</th>
                    <td>{{ $album->nom }}</td>
                    <td>{{ $album->description }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn text-white mx-1 btn-warning" href={{ route("albums.show", $album->id) }}>Show</a>
                            <a class="btn text-white mx-1 btn-primary" href={{ route("albums.edit", $album->id) }}>Edit</a>
                            <form action={{ route("albums.destroy", $album->id) }} method="post">
                                @csrf
                                @method("delete")
                                <button class="btn text-white mx-1 btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection