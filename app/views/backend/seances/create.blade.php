@extends('backend.layout')

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Séances" => "/backend/seances",
        "Création" => null
    )
?>
@stop

@section('titre_page')
Gestions des séances
@stop

@section('content')
{{ Form::open(['route' => 'backend.seances.store']) }}
    <article class="module width_full">
			<header><h3>Ajouter une nouvelle seance</h3></header>
				<div class="module_content">
							{{ Form::label('date', 'Date de la séance:') }}
                            {{ Form::date('date',date('Y-m-d h:i')) }}
						<br/>
						    {{ Form::label('id_patient', 'Patient:') }}
                            {{ Form::select('id_patient', $patients) }}
                        <br/>
                            {{ Form::label('lieu', 'Lieu:') }}
                            {{ Form::select('lieu', array(
                                'domicile' => 'à domicile',
                                'cabinet' => 'au cabinet',
                                'exterieur' => "à l'extérieur"
                            )) }}
                        <br/> 
                            {{ Form::label('duree', 'Durée:') }}
                            {{ Form::select('duree', array(
                                '0.5' => '0h30',
                                '1' => '1h00',
                                '1.5' => "1h30",
                                '2' => '2h00'
                            ),'1') }}
                        <br/> 
                            {{ Form::label('tarif', 'Tarif:') }}
                            {{ Form::select('tarif', array(
                                '40' => 'Etudiant 40€/h',
                                '50' => 'Normal 50€/h',
                            ),'50') }}
                        <br/> 
                        
                            {{ Form::label('titre', 'Titre de la séance:') }}
                            {{ Form::text('titre') }}
                        <br/>
                        
                        <br/>
                            {{ Form::ckedit('commentaire') }}
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