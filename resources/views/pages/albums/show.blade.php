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
                    <th>Delete Album</th>
                    <th>Delete Photo</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($albums as $album) --}}
                    <tr>
                        <td>{{ $albums->id }}</td>
                        <td>{{ $albums->nom }}</td>
                        <td>{{ $albums->auteur }}</td>
                        <td>{{ $albums->photo->id }}</td>
                        <td width="10%" >
                           <img class="rounded-pill w-100" src=" {{asset('storage/img/'.$albums->photo->url)}}" alt="photo supprimé">
                        </td>
                        <td width="10%">
                            <a href="/edit/{{$albums->id}}">
                                <button class="btn btn-outline-warning">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="/{{$albums->id}}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete Album</button>
                            </form>
                        </td>
                        <td>
                            <form action="/{{$albums->id}}/deletephoto" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete photo</button>
                            </form>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
