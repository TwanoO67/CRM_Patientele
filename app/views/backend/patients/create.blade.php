@extends('backend.layout')

@section('titre_page')
Gestions des patients
@stop


@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Patient" => "/backend/patients",
        "Nouveau patient" => null
    )
?>
@stop

@section('content')
{{ Form::open(['route' => 'backend.patients.store']) }}
    <article class="module width_full">
        
		<header><h3 class="tabs_involved">Information générales</h3></header>
		
		
		<div class="module_content">
                
                                
                    {{ Form::label('nom','Nom:') }}
                    {{ Form::text('nom')}}
                    {{ $errors->first('nom' ,'<span class="wrapper">:message</span>') }}
                    <br/>
                    {{ Form::label('prenom','Prenom:') }}
                    {{ Form::text('prenom')}}
                    {{ $errors->first('prenom' ,'<span class="wrapper">:message</span>') }}
                    <br/>
                    {{ Form::label('date','Date de naissance:') }}
                    {{ Form::datetime('date_naissance')}}
                    <br/>
                    {{ Form::label('adresse','Adresse postale:') }}
                    <br/>
                    {{ Form::textarea('adresse')}}
                    <br/>
                    {{ Form::label('telephone','Téléphone:') }}
                    {{ Form::text('telephone')}}
                    <br/>
                    {{ Form::label('email','Email:') }}
                    {{ Form::text('email')}}
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
                    {{ Form::textarea('motif')}}
                </fieldset>
                <fieldset>
                    {{ Form::label('attente', 'Attentes de la thérapie:') }}
                    {{ Form::textarea('attente')}}
                </fieldset>
                <fieldset>
                    {{ Form::label('objectif', 'Objectifs fixés:') }}
                    {{ Form::textarea('objectif')}}
                </fieldset>
                <fieldset>
                    {{ Form::label('entourage', 'Entourage:') }}
                    {{ Form::textarea('entourage')}}
                </fieldset>
                <fieldset>
                    {{ Form::label('traitement', 'Traitements:') }}
                    {{ Form::textarea('traitement')}}
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