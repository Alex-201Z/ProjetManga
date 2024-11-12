@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="blanc">
            <h1>Liste de mes Mangas</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scenariste</th>
                <th>Prix</th>
                <th>Couverture</th>
               <th><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                         title="Modifier"></span></th>
                <th><span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top"
                          title="Supprimer"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($mangas as $manga)
                <tr>
{{--                    <td>{{ $manga->id_manga }}</td>--}}

                    <td>{{ $manga->titre }}</td>
                    <td>{{ $manga->lib_genre }}</td>
                    <td>{{ $manga->nom_dessinateur }}</td>
                    <td>{{ $manga->nom_scenariste }}</td>
                    <td>{{ $manga->prix }}</td>
                    <td class="col-xs-2">
                        <img class="img-rounded" src="{{url('/assets/images')}}/{{ $manga -> couverture }}"
                             style="max-height: 150px;">
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ url('/modifierManga') }}/{{ $manga->id_manga }}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                                  title="Modifier"></span>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('vous êtes sûr de vouloir supprimer?')"
                           href=" ">
                            <span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top"
                                  title="Supprimer"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            <BR> <BR>
        </table>
    </div
@stop
