@extends('backend.layout')

@section('titre_page')
Gestions des utilisateurs
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Utilisateur" => "/backend/users",
        strtoupper($user->nom).' '.ucfirst($user->prenom)." (Voir)" => null
    )
?>
@stop

@section('content')
<article class="module width_full">
        
		<header><h3>Consultation du user</h3></header>

		<div class="module_content">
	        <h1>Profil</h1>
	        
	        {{$user->nom}}<br/>
	        {{$user->prenom}}<br/>
	        {{$user->login}}<br/>
	        
		</div>
@stop