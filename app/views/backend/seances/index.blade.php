@extends('backend.layout')

@section('titre_page')
Gestions des séances
@stop

@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Séance" => "/backend/seances",
    )
?>
@stop

@section('content')
    <article class="module width_full">
		<header><h3 class="tabs_involved">Listes des dernières séances</h3>
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
   					<!--<th></th> -->
    				<th>Patient</th> 
    				<th>Commentaire</th> 
    				<th>Date</th> 
    				<th>Actions</th>
				</tr> 
			</thead> 
			<tbody> 
				@foreach( $seances as $seance)
				<tr> 
   					<!--<td><input type="checkbox"></td> -->
   					
    				<td>
        				@if(isset($seance->patient))
        				{{strtoupper($seance->patient->nom).' '.ucfirst($seance->patient->prenom)}}
        				@else
        				Pas de patient définie
        				@endif</td> 
    				
    				<td>{{$seance->commentaire}}</td> 
    				<td>{{$seance->date}}</td> 
    				<td>
    				    <a href="/backend/seances/{{$seance->id}}/edit">
    				        <input type="image" src="/img/backend/icn_edit.png" title="Editer">
    				    </a>
    				    <a href="/backend/seances/{{$seance->id}}" data-method="DELETE" class="rest">
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
@stop