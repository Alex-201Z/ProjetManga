@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="blanc">
            <h1>Liste de mes Mangas</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Manga</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Couverture</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scenariste</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mesMangas as $unMan)
                <tr>
                    <td>{{ $unMan->id_manga }}</td>
                    <td>{{ $unMan->titre }}</td>
                    <td>{{ $unMan->prix }}</td>
                    <td>{{ $unMan->couverture }}</td>
                    <td>{{ $unMan->lib_genre }}</td>
                    <td>{{ $unMan->nom_dessinateu }}</td>
                    <td>{{ $unMan->nom_scenariste }}</td>
                    <td style="text-align:center;">
                        <a href="{{ url('/modifierManga') }}/{{ $unMan->id_manga }}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier">

                            </span></a></td>
                </tr>
            @endforeach
            <BR> <BR>
        </table>
    </div>
@stop
