<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\photo;
use App\Policies\PhotoPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $albums = Album::all();
        return view( 'pages.albums.index', compact( 'albums' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $albums = Album::all();
        $photos = photo::all();
        return view( 'pages.albums.create', compact( 'albums', 'photos' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreAlbumRequest  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        $photos = new photo;
        Storage::put( 'public/img/', $request->file( 'url' ) );
        $photos->url = $request->file( 'url' )->hashName();
        $photos->save();

        $albums = new Album;
        $albums->nom = $request->nom;
        $albums->auteur = $request->auteur;

        $albums->photo_id = $photos->id;
        $albums->save();

        return redirect()->back();

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $albums = Album::find( $id );
        return view( 'pages.albums.show', compact( 'albums' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $albums = Album::find( $id );
        return view( 'pages.albums.edit', compact( 'albums' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateAlbumRequest  $request
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $photos = photo::find( $id );
        if ( $request->file( 'url' ) != null ) {
            Storage::delete( 'public/img/'.$photos->url );
            Storage::put( 'public/img/', $request->file( 'url' ) );
            $photos->url = $request->file( 'url' )->hashName();
            $photos->save();
        }
        $albums = Album::find( $id );
        $albums->nom = $request->nom;
        $albums->auteur = $request->auteur;
        $albums->photo_id = $albums->photo->id;
        $albums->save();
        return redirect()->back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Album  $album
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $albums = Album::find( $id );
        $photo = photo::find( $id );
        Storage::delete( 'public/img/'.$albums->photo->url );
        $albums->delete();
        $photo->delete();
        return redirect( '/' );
    }

    public function destroyphoto( Request $request, $id ) {
        $photo = Album::find( $id );
        Storage::delete( 'public/img/'.$photo->photo->url );
        // $photo->delete();
        return redirect()->back();

    }
}
// Storage::delete( 'public/img/' . $membres->img );
