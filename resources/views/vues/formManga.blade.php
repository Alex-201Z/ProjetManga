@extends('layouts.master')
@section('content')
    <div>
        <div class="container">
            <div class="blanc">
                <h1>Ajouter un manga</h1>
            </div>
            {!!  Form::open(['route' => 'postManga','files'=> true]) !!}
            <div class="col-md-9 well well-sm">
                <div class="form-group">
                    <label class="col-md-3 control-label">Titre :</label>
                    <div class="col-md-6">
                        <input type="text" name="txt_titre" value="{{ $manga->titre }}" class="form-control" required autofocus/>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Genre :</label>
                    <div class="col-md-6">
                        <input type="hidden" name="hid_id" value="{{ $manga->id_manga }}" />
                        <select class="form-control" name="sel_genre">
                            <option value="0" disabled selected="selected">Sélectionner un genre</option>
                            @foreach ($genres as $unG)
                                <option value="{{ $unG->id_genre }}"
                                @if ($unG -> id_genre ==  $manga-> id_genre)
                                    selected="selected"
                                    @endif
                                    >{{ $unG->lib_genre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Dessinateur :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_dessinateur">
                            <option value="0" disabled selected="selected">Sélectionner un Dessinateur</option>
                            @foreach ($dessinateurs as $und)
                                <option value="{{ $und->id_dessinateur }}"
                                        @if ($und -> id_dessinateur ==  $manga-> id_dessinateur)
                                            selected="selected"
                                    @endif
                                >{{ $und->nom_dessinateur }},{{ $und->prenom_dessinateur }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Scenariste :</label>
                    <div class="col-md-6">
                        <select class="form-control" name="sel_scenariste">
                            <option value="0" disabled selected="selected">Sélectionner un Scenariste</option>
                            @foreach ($scenaristes as $unS)
                                <option value="{{ $unS->id_scenariste }}"
                                @if ($unS -> id_scenariste ==  $manga-> id_scenariste)
                                    selected="selected"
                                @endif
                                    >{{ $unS->nom_scenariste }},{{ $unS->prenom_scenariste }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-md-3 control-label">Prix :</label>
                    <div class="col-md-3">
                        <input type="number" step=".01" name="num_prix" value="{{ $manga->prix }}" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Couverture :</label>
                    <div class="col-md-6">
                        <input type="hidden" name="MAX_FILE_SIZE" value="204800" />
                        <input type="file" accept="image/*" name="fil_couv" class="btn btn-default pull-left"/>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-default btn-primary"><span
                                class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        <button type="button" class="btn btn-default btn-primary"
                                onclick="{ window.location = '{{ url('/') }}';}">
                            <span class="glyphicon glyphicon-remove"></span>Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop