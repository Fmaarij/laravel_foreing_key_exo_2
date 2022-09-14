@extends('layouts.index')
@section('content')
<div class="container my-5">
    <form action="/{{$albums->id}}/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Nom</label>
        <input type="text" name="nom" id="" value="{{$albums->nom}}">

        <label for="">Auteur</label>
        <input type="text" name="auteur" id="" value="{{$albums->auteur}}">

        {{-- <label for="">Photo_ID</label>
        <input type="number" name="photo_id" id=""> --}}

        {{-- <label for="">Url d'image</label> --}}
        {{-- <img src="{{asset('storage/img/' .$albums->photo_id)}}" alt=""> --}}
        <img class="rounded-pill w-25" src=" {{asset('storage/img/'.$albums->photo->url)}}" alt="photo supprimé">
        <input type="file" name="url" id="">

        <button type="submit">Update</button>
    </form>
</div>
@endsection
