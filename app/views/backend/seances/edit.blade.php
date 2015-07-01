@extends('backend.layout')

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Séances" => "/backend/seances",
        "modification" => null
    )
?>
@stop

@section('titre_page')
Gestions des séances
@stop

@section('content')
{{ Form::model($seance, array('route' => array('backend.seances.update', $seance->id), 'method' => 'PUT')) }}
    <article class="module width_full">
			<header><h3>Modifier une séance</h3></header>
				<div class="module_content">
							{{ Form::label('date', 'Date de la séance:') }}
                            {{ Form::datetime('date', $seance->date) }}
						<br/>
						    {{ Form::label('id_patient', 'Patient:') }}
                            {{ Form::select('id_patient', $patients, $seance->id_patient) }}
                        <br/>
                            {{ Form::label('lieu', 'Lieu:') }}
                            {{ Form::select('lieu', array(
                                'domicile' => 'à domicile',
                                'cabinet' => 'au cabinet',
                                'exterieur' => "à l'extérieur"
                            ), $seance->lieu) }}
                        <br/> 
                            {{ Form::label('duree', 'Durée:') }}
                            {{ Form::select('duree', Config::get("app.seances.duree"), $seance->duree) }}
                        <br/> 
                            {{ Form::label('tarif', 'Tarif:') }}
                            {{ Form::select('tarif', Config::get("app.seances.tarif"), $seance->tarif) }}
                        <br/> 
                        
                            {{ Form::label('titre', 'Titre de la séance:') }}
                            {{ Form::text('titre', $seance->titre) }}
                        <br/>
                        
                        <br/>
                            {{ Form::ckedit('commentaire', $seance->commentaire) }}
						<br/>
						
				</div>
			<footer>
				<div class="submit_link">
					{{ Form::submit('Valider') }}
				</div>
			</footer>
		</article>
{{ Form::close() }}
@stop