@extends('backend.layout')

@section('titre_page')
Gestions des patients
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => '/backend',
        "Liste des Patients" => null
    )
?>
@stop

@section('content')
    <article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Listes des patients</h3>
		<!--<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>-->
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<!--<th></th>--> 
    				<th>Nom</th> 
    				<th>Prénom</th> 
    				<th>Date de naissance</th> 
					<th>Téléphone</th>
					<th>Email</th>
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				@foreach( $patients as $patient)
				<tr> 
   					<!--<td><input type="checkbox"></td>-->
    				<td><a href="/backend/patients/{{$patient->id}}">{{strtoupper($patient->nom)}}</a></td> 
    				<td><a href="/backend/patients/{{$patient->id}}">{{ucfirst($patient->prenom)}}</a></td> 
    				<td>{{$patient->date_naissance}}</td> 
					<td>{{$patient->telephone}}</td> 
					<td>{{$patient->email}}</td> 
    				<td>
    				    <a href="/backend/patients/{{$patient->id}}/edit">
    				        <input type="image" src="/img/backend/icn_edit.png" title="Editer">
    				    </a>
    				    <a href="/backend/patients/{{$patient->id}}" data-method="DELETE" class="rest">
    				        <input type="image" src="/img/backend/icn_trash.png" title="Supprimer">
    				    </a>
    				</td> 
				</tr> 
				@endforeach
				
			</tbody> 
			</table>
			</div><!-- end of #tab1 
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Comment</th> 
    				<th>Posted by</th> 
    				<th>Posted On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				<tr> 
   					<td><input type="checkbox"></td> 
    				<td>Lorem Ipsum Dolor Sit Amet</td> 
    				<td>Mark Corrigan</td> 
    				<td>5th April 2011</td> 
    				<td><input type="image" src="/img/backend/icn_edit.png" title="Edit"><input type="image" src="/img/backend/icn_trash.png" title="Trash"></td> 
				</tr> 
			</tbody> 
			</table>

			</div>
			end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
		    <header><h3>Rechercher</h3></header>
		    {{ Form::open(['route' => 'backend.patients.store'])}}
		    <div class="module_content">
		        {{ Form::label('nom', 'Nom:') }}
                {{ Form::text('nom')}}
                <br/>
		    </div>
            <footer>
				<div class="submit_link">                  
                    {{ Form::submit('Valider') }}
				</div>
            </footer>
            {{ Form::close() }}
		</article>
@stop