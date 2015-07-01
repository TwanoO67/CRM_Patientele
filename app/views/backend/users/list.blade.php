@extends('backend.layout')

@section('titre_page')
Gestions des utilisateurs
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Utilisateur" => "/backend/users"
    )
?>
@stop

@section('content')
<article class="module width_full">
        
		<header><h3>Liste des utilisateurs</h3></header>

		<div class="module_content">
            {{ link_to('users/create','Ajouter') }}
        
	        <ul>
	        
	        @if( $users->count() < 1 )
	            Pas d'utilisateur en base
	        @else
	        
	            @foreach( $users as $user)
	                <li>{{ link_to("/backend/users/{$user->id}", $user->nom.'&nbsp;'.$user->prenom ) }}</li>
	            @endforeach
	        
	        @endif
	        </ul>
	        </div>
            
            
    </article>
@stop