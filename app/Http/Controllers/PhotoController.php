<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos= Photo::paginate(2);
        return view("backoffice.photo.all", compact("photos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums= Album::all();
        return view("backoffice.photo.create",compact("albums"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = new Photo;
        $photo->nom = $request->nom;
        $photo->lien = $request->file("lien")->hashName();
        $photo->categorie = $request->categorie;
        $photo->description = $request->description;
        $photo->album_id = $request->album_id;
        $photo->created_at = now();

        $photo->save();
        $request->file("lien")->storePublicly("img", "public");

        return redirect()->route("photos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
      
        return view("backoffice.photo.show", compact("photo")); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view("backoffice.photo.edit", compact("photo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->nom = $request->nom;
        if ($request->file("lien") !== null) {
            Storage::disk("public")->delete("img/" . $photo->lien);
            $photo->lien = $request->file("lien")->hashName();
            $request->file("lien")->storePublicly("img", "public");
        }
        $photo->categorie = $request->categorie;
        $photo->description = $request->description;
        $photo->album_id = $request->album_id;
        $photo->updated_at = now();

        $photo->save();

        return redirect()->route("photos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Storage::disk("public")->delete("img/" . $photo->lien);
        $photo->delete();

        return redirect()->back();
    }
    public function download($id)
    {
        $photo = Photo::find($id);
        return Storage::disk("public")->download("img/" . $photo->lien);
    }
}
