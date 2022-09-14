@extends('layouts.index')
@section('content')
<div class="container my-5">
    <form action="/createalbum" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Nom</label>
        <input type="text" name="nom" id="">

        <label for="">Auteur</label>
        <input type="text" name="auteur" id="">

        {{-- <label for="">Photo_ID</label>
        <input type="number" name="photo_id" id=""> --}}

        <label for="">Url d'image</label>
        <input type="file" name="url" id="">

        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection
