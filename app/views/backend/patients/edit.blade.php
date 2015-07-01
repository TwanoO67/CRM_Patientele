@extends('backend.layout')

@section('titre_page')
Gestions des patients
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Patient" => "/backend/patients",
        strtoupper($patient->nom).' '.ucfirst($patient->prenom)." (Editer)" => null
    )
?>
@stop

@section('content')
{{ Form::model($patient, array('route' => array('backend.patients.update', $patient->id), 'method' => 'PUT')) }}
    <article class="module width_full">
        
		<header><h3 >Modification du patient</h3></header>

		<div class="module_content">
            {{ Form::label('nom','Nom:') }}
            {{ Form::text('nom', $patient->nom)}}
            <br/>
            {{ Form::label('prenom','Prenom:') }}
            {{ Form::text('prenom', $patient->prenom)}}
            <br/>
            {{ Form::label('date','Date de naissance:') }}
            {{ Form::date('date_naissance', $patient->date_naissance)}}
            <br/>
            {{ Form::label('adresse','Adresse postale:') }}
            <br/>
            {{ Form::textarea('adresse', $patient->adresse)}}
            <br/>
            {{ Form::label('telephone','Téléphone:') }}
            {{ Form::text('telephone', $patient->telephone)}}
            <br/>
            {{ Form::label('email','Email:') }}
            {{ Form::text('email', $patient->email)}}
        </div>
            
        <footer>
            <div class="submit_link">
            {{ Form::submit('Valider') }}
            </div>
        </footer>
            
    </article>
		
    <article class="module width_full">
        
		<header><h3 class="tabs_involved">Information médicale</h3></header>
		<div class="module_content">

            <fieldset>
                {{ Form::label('motif', 'Motif de la consultation:') }}
                {{ Form::textarea('motif', $patient->motif)}}
            </fieldset>
            <fieldset>
                {{ Form::label('attente', 'Attentes de la thérapie:') }}
                {{ Form::textarea('attente', $patient->attente)}}
            </fieldset>
            <fieldset>
                {{ Form::label('objectif', 'Objectifs fixés:') }}
                {{ Form::textarea('objectif', $patient->objectif)}}
            </fieldset>
            <fieldset>
                {{ Form::label('entourage', 'Entourage:') }}
                {{ Form::textarea('entourage', $patient->entourage)}}
            </fieldset>
            <fieldset>
                {{ Form::label('traitement', 'Traitements:') }}
                {{ Form::textarea('traitement', $patient->traitement)}}
             </fieldset>

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