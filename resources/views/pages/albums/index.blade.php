@extends('layouts.index')
@section('content')
    <div class="container my-5">
        <table class="table table-striped table-bordered table-hover table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Auteur</th>
                    <th>Photo_ID</th>
                    <th>Photo</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->nom }}</td>
                        <td>{{ $album->auteur }}</td>
                        <td>{{ $album->photo->id }}</td>
                        <td width="10%" >
                           <img class="rounded-pill w-100" src=" {{asset('storage/img/'.$album->photo->url)}}" alt="photo supprimé">
                        </td>
                        <td width="10%">
                            <a href="/show/{{$album->id}}">
                                <button class="btn btn-outline-primary">Show</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
