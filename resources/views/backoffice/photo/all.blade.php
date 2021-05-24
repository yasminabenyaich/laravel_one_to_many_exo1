@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <section class="container">
        <h1 class="text-center my-5">Photos</h1>
        <a class="btn btn-success" href={{ route("photos.create") }}>Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Description</th>
                    <th scope="col">Album</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <th scope="row">{{ $photo->id }}</th>
                        <td>{{ $photo->nom }}</td>
                        <td><img style="width : 200px" src={{ asset('img/'. $photo->lien) }} alt=""></td>
                        <td>{{ $photo->categorie }}</td>
                        <td>{{ $photo->description }}</td>
                        <td>{{ $photo->album->nom }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn text-white mx-1 btn-warning" href={{ route("photos.show", $photo->id) }}>Show</a>
                                <a class="btn text-white mx-1 btn-primary" href={{ route("photos.edit", $photo->id) }}>Edit</a>
                                <form action={{ route("photos.destroy", $photo->id) }} method="post">
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