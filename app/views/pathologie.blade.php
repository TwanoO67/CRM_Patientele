@extends('layouts.default')

@section('content')
<h2 class="featurette-heading">
    {{$patho->titre}} 
    @if( $patho->sous_titre != '')
        <br/><span class="text-muted">{{$patho->sous_titre}}</span>
    @endif
</h2>    
<br/>
<p>
    {{$patho->texte}}
</p>
<br/>
<br/>
<div class="row">
    <div class='col-md-6'>
        <blockquote><p><i class="fa fa-quote-left fa-2x pull-left"></i>{{$patho->exemple1_texte}}<i class="fa fa-quote-right fa-2x pull-right"></i></p><p><small>{{$patho->exemple1_legende}}</small></p></blockquote>
    </div>
    
    <div class='col-md-6'>
        <blockquote><p><i class="fa fa-quote-left fa-2x pull-left"></i>{{$patho->exemple2_texte}}<i class="fa fa-quote-right fa-2x pull-right"></i></p><p><small>{{$patho->exemple2_legende}}</small></p></blockquote>
    </div>
</div>

<hr class="featurette-divider">
<br/>    
<div class="row featurette">

    <div class="col-md-5">
      <img class="featurette-image img-responsive" src="{{$patho->paragraphe1_image}}" alt="">
    </div>


    <div class="col-md-7">
      <h2 class="featurette-heading">{{$patho->paragraphe1_titre}} <span class="text-muted">{{$patho->paragraphe1_soustitre}}</span></h2>
      <p class="lead">{{$patho->paragraphe1_texte}}</p>
    </div>

</div>
      
<hr class="featurette-divider">
<br/> 
<div class="row featurette">

    <div class="col-md-7">
      <h2 class="featurette-heading">{{$patho->paragraphe2_titre}} <span class="text-muted">{{$patho->paragraphe2_soustitre}}</span></h2>
      <p class="lead">{{$patho->paragraphe2_texte}}</p>
    </div>


    <div class="col-md-5">
      <img class="featurette-image img-responsive" src="{{$patho->paragraphe2_image}}" alt="">
    </div>
</div>
      
<hr class="featurette-divider">
<br/> 
<div class="row featurette">

    <div class="col-md-5">
      <img class="featurette-image img-responsive" src="{{$patho->paragraphe3_image}}" alt="">
    </div>
    
    
    <div class="col-md-7">
      <h2 class="featurette-heading">{{$patho->paragraphe3_titre}} <span class="text-muted">{{$patho->paragraphe3_soustitre}}</span></h2>
      <p class="lead">{{$patho->paragraphe3_texte}}</p>
    </div>
        
 </div>
 @stop

