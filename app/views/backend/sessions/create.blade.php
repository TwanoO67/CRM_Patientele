@extends('backend.layout')

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => '/backend/',
        "Connexion" => null
    )
?>
@stop

@section('content')

    @if ($error != '')
	    <h4 class="alert_error">{{ $error }}</h4>
	@else
        <h4 class="alert_warning"> Merci de vous connecter pour accéder à l'interface de gestion</h4>
	@endif

    <article class="module width_quarter">
		<header><h3 class="tabs_involved">Connexion</h3>
		<!--<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>-->
		</header>
		
		<div class="module_content">
            {{ Form::open(['route' => 'backend.sessions.store']) }}
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email') }}
                <br/>
                 {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                <br/>
                {{ Form::submit('Valider')}}
            {{ Form::close() }}
		</div>
    </article>
 @stop