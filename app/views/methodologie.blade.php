@extends('layouts.default')

@section('content')
<br/>
<br/>
<h2 class="featurette-heading">{{$metho->titre}}
@if( $metho->sous_titre != '')
<br/><span class="text-muted">{{$metho->sous_titre}}</span>
@endif
</h2>    
<br/>
{{$metho->texte}}

@stop