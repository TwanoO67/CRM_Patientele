@extends('layouts.default')

@section('top')

<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        @foreach($slides as $key=>$slide)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" {{ ($key == 0)? 'class="active"':'' }} ></li>
        @endforeach
      </ol>
      
      <div class="carousel-inner">
          @foreach($slides as $key=>$slide)
          <div class="item {{ ($key == 0)? 'active':'' }} ">
              @if( $slide->image != '')
              <img src="{{$slide->image}}" alt="" />
              @endif
              <div class="container">
                <div class="carousel-caption">
                  <h1>{{$slide->titre}}</h1>
                  <p>{{$slide->texte}}</p>
                  <p>
                  <?php /*if($slide->link_url != ''  && substr($slide->link_url,0,4) != "http" ){ ?>
                      <script> 
                          require_once('/js/bootbox.min.js');
                      </script>
                      <a class="btn btn-lg btn-primary" onclick="bootbox.alert(atob('<?php echo base64_encode(str_replace("\n",'<br/>',htmlentities($slide->link_url))); ?>'))" role="button">
                      
                  <?php } else { ?>
                    <a class="btn btn-lg btn-primary" href="{{$slide->link_url}}" role="button">
                    <?php
                   } 
                   ?>
                      {{$slide->link_texte}}
                  </a> 
                    */?>
                </p>
                </div>
              </div>
            </div>
          @endforeach
      </div>
      
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({interval: 10000});
        });
    </script>
    <!-- /.carousel -->
@stop


@section('content')
<style>
    /*ajout de l'effet bounce sur les ronds */
    .img-circle{
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
    
    .img-circle:hover{
        -webkit-transform: scale(1.3);
        -moz-transform: scale(1.3);
        -o-transform: scale(1.3);
        transform: scale(1.3);
    } 
</style>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        
    <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p><b> Lucas BORZA </b> psychologue diplomé de l'université de Lille, applique les TCC (thérapie cognitives et comportementale) pour répondre aux différentes problématiques de la vie quotidienne.<br/>
                Dans son cabinet, ou à votre domicile, il vous rencontre et vous aide à traverser les situations difficiles de la vie.
            </p>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3"></div>
    </div>
    <hr class="featurette-divider">

      <!-- Three columns of text below the carousel -->
      <div class="row">
          @foreach( $headings as $heading)
            <div class="col-lg-4">
              <img class="img-circle" width='140px' height='140px' 
                @if( $heading->image == '' ) 
                data-src="holder.js/140x140" 
                @else
                src="{{$heading->image}}"
                @endif 
              alt="Generic placeholder image">
              <h2>{{$heading->titre}}</h2>
              <p>{{$heading->texte}}</p>
              <p><a class="btn btn-default" href="{{$heading->lien}}" role="button">View details &raquo;</a></p>
            </div>
        @endforeach
      </div><!-- /.row -->


      <!-- START THE FEATURETTES 
      @foreach( $featurets as $key=>$featuret)
          <hr class="featurette-divider">
          
          <div class="row featurette">
          
            @if( ($key%2) == 0  )
                <div class="col-md-5">
                  <img class="featurette-image img-responsive" src="{{$featuret->image}}" alt="">
                </div>
            @endif
        
            <div class="col-md-7">
              <h2 class="featurette-heading">{{$featuret->titre}} <span class="text-muted">{{$featuret->sous_titre}}</span></h2>
              <p class="lead">{{$featuret->texte}}</p>
            </div>
            
            @if( ($key%2) != 0  )
                <div class="col-md-5">
                  <img class="featurette-image img-responsive" src="{{$featuret->image}}" alt="">
                </div>
            @endif
          </div>
      @endforeach
      
    /END THE FEATURETTES -->
@stop