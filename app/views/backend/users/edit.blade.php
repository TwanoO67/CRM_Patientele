@extends('backend.layout')

@section('titre_page')
Gestions des utilisateurs
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Utilisateur" => "/backend/users",
        strtoupper($user->nom).' '.ucfirst($user->prenom)." (Editer)" => null
    )
?>
@stop

@section('content')
{{ Form::model($user, array('route' => array('backend.users.update', $user->id), 'method' => 'PUT')) }}
    <article class="module width_full">
        
		<header><h3 >Modification du user</h3></header>

		<div class="module_content">
            {{ Form::label('nom','Nom:') }}
            {{ Form::text('nom', $user->nom)}}
            <br/>
            {{ Form::label('prenom','Prenom:') }}
            {{ Form::text('prenom', $user->prenom)}}
            <br/>
            {{ Form::label('email','Email:') }}
            {{ Form::text('email', $user->email)}}
        </div>
            
        <footer>
            <div class="submit_link">
            {{ Form::submit('Valider') }}
            </div>
        </footer>
            
    </article>
		
{{ Form::close() }}

@stop