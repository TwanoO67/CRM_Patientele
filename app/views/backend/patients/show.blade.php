@extends('backend.layout')

@section('titre_page')
Gestions des patients
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Patient" => "/backend/patients",
        strtoupper($patient->nom).' '.ucfirst($patient->prenom) => null
    )
?>
@stop

@section('content')
    <article class="module width_quarter">
        
		<header><h3 >Informations</h3></header>
		
		
		<div class="module_content">
                
                                
                    {{ Form::label('nom','Nom:') }}
                    <b>{{ $patient->nom}}</b>
                    <br/>
                    {{ Form::label('prenom','Prenom:') }}
                    <b>{{$patient->prenom}}</b>
                    <br/>
                    {{ Form::label('date','Date de naissance:') }}
                    <b>{{ $patient->date_naissance}}</b>
                    <br/>
                    {{ Form::label('adresse','Adresse postale:') }}
                    <br/>
                    <b>{{ $patient->adresse}}</b>
                    <br/>
                    {{ Form::label('telephone','Téléphone:') }}
                    <b>{{ $patient->telephone}}</b>
                    <br/>
                    {{ Form::label('email','Email:') }}
                    <b>{{ $patient->email}}</b>
        </div>

            
            
		</article>
		
		
		<article class="module width_3_quarter">
        
		<header><h3 >Liste des séances</h3></header>
		
		
		<div class="module_content"> 
            @foreach( $patient->seances as $seance)
				<a href="/backend/seances/{{$seance->id}}/edit">
				<b>{{$seance->date}} </b>{{substr(strip_tags($seance->commentaire),0,60).'...'}}
			    </a><br/>
            @endforeach
        </div>
            
            
		</article>
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
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

@stop