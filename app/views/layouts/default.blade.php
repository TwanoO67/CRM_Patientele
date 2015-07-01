<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/jpg" href="/img/penseur_rodin.png"> 
    <link rel="shortcut icon" type="image/x-icon" href="/img/penseur_rodin.png">


    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/holder.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/js/require_once.js" type="text/javascript"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lt IE 9]>
      <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
      <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
    
	<title>BORZA Lucas - Psychologue</title>
    @yield('header')
</head>
<body @if( $body_class != '') class='{{$body_class}}' @endif>



<!- ==================== MENU NAVIGATION ========= -->
<div class="navbar-wrapper">
    <div class="container">
    
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">BORZA Lucas - Psychologue</a>
            </div>
            
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <?php 
                //CALCUL DU MENU
                    // <li class="active"><a href="#">Accueil</a></li>
                    $menu = Config::get("app.menu");
                    
                    $split = explode('/',$_SERVER['REQUEST_URI']);
                    $categorie = isset($split[1])?$split[1]:$split[0];
                    
                    foreach($menu as $key=>$value){
                        if( !is_array($value) ){
                            echo "<li ";
                            if( $_SERVER['REQUEST_URI'] == $value){
                                echo "class='active' ";
                            }
                            echo "><a href='".$value."' >".$key."</a></li>";
                        }
                        else{
                            //calcul de la catégorie (en se basant sur le premier lien du menu
                            foreach($value as $titre => $lien){
                                $split = explode('/',$lien);
                                $categorie_voulue = isset($split[1])?$split[1]:$split[0];
                                if( substr($lien,0,1) == '/') break;
                            }
                        
                            echo "<li class='";
                            
                            if( $categorie == $categorie_voulue){
                                echo "active ";
                            }
                            else{
                                echo $categorie;
                            }
                            echo "dropdown'>";
                            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$key.'<b class="caret"></b></a>';
                            echo '<ul class="dropdown-menu">';
                            foreach($value as $titre => $lien){
                                if($lien == "<divider>"){
                                    echo '<li class="divider"></li>';
                                }
                                elseif($lien == "<header>"){
                                    echo '<li class="dropdown-header">'.$titre.'</li>';
                                }
                                //lien normaux
                                else{
                                    echo '<li';
                                    if( $_SERVER['REQUEST_URI'] == $lien){
                                        echo " class='active' ";
                                    }
                                    echo '><a href="'.$lien.'">'.$titre.'</a></li>';
                                }
                            
                            }
                            echo '</ul>';
                            echo '</li>';
                        }
                    }
                ?>
              </ul>
              
              
            </div>
          </div>
        </div>
        
     </div>
</div>
<!- ==================== FIN MENU NAVIGATION ========= -->


@yield('top')

<div class="container">

    @yield('content')

    <hr class="featurette-divider">
      <!-- FOOTER -->
      <!--<div class="well">-->
      <footer>
        <p class="pull-right"><a href="#">Retour en haut</a></p>
        <p>&copy; 2015 &middot; <a href='http://www.weberantoine.fr'>WEBER Antoine</a> <!-- &middot; <a href="/cgu">CGU</a> &middot;--> </p>
      </footer>
      <!--</div>-->

</div> <!-- container -->
	
	
	@yield('footer')
	
</body>
</html>