<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Admin</title>
	
	<link rel="icon" type="image/jpg" href="/img/backend/icn_user.png"> 
    <link rel="shortcut icon" type="image/x-icon" href="/img/backend/icn_user.png">
	
	
	<link rel="stylesheet" href="/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--script src="/js/jquery-1.5.2.min.js" type="text/javascript"></script-->
	<script src="/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="/js/hideshow.js" type="text/javascript"></script>
	<script src="/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script src="/js/jquery.equalHeight.js" type="text/javascript"></script>
	<!-- permet d'avoir un formulaire en put dans la page -->
	<script src="/js/jquery.restfulizer.js" type="text/javascript"></script>
	<!-- permet de loader seulemement les scripts nécessaire -->
	<script src="/js/require_once.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    { 
      	  $(".tablesorter").tablesorter(); 
      	  
      	  $(".rest").restfulizer();
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	//$('.column').delay(3000).equalHeight();

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
        $(window).resize(function(){
            $('.column').equalHeight();
        });
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="/backend">Gestion Administrative</a></h1>
			<h2 class="section_title">
			@yield('titre_page')
			</h2><div class="btn_view_site"><a href="/">Retour au site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
	    
		<div class="user">
		    <?php if ( Auth::check() ){ ?>
			<p><?php echo Auth::user()->nom." ".Auth::user()->prenom; ?> <?php if ( isset (Auth::user()->message) ){ ?>(<a href="#">3 Messages</a>)<?php } ?></p>
			<a class="logout_user" href="/backend/logout" title="Logout">Déconnexion</a>
			<?php }
			else{
			 ?>
			 <p> Utilisateur anonyme </p>
			 <?php } ?>
		</div>
		
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
			    @yield('fil_ariane')
                <?php 
                
                if(isset($fil_ariane) && is_array($fil_ariane)){
                    //denrier element du tableau
                    end($fil_ariane);
                    $last_name = key($fil_ariane);
                    reset($fil_ariane);
                    $first = true;
                
                
                    foreach($fil_ariane as $name => $link){
                        if(!$first){
                            echo '<div class="breadcrumb_divider"></div>';
                        }
                        else{
                            $first = false;
                        }
                    
                        echo "<a ";
                            if($name == $last_name)
                                echo "class='current' ";
                            elseif($link != '' && $link != null)
                                echo "href='".$link."' ";
                            else
                                echo "href='#' ";
                            
                        
                        echo "> $name</a>";
                        
                    }
                }
                ?>
                
            </article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		
		<?php if ( Auth::check() ){ ?>
		<h3>Contenu du site</h3>
		<ul class="toggle">
		<li class="icn_dashboard">{{ link_to("/backend/", "Tableau de bord") }}</li>
		<br/>
		<li class="icn_settings">
		    <form action='http://lucas.weberantoine.fr/phpliteadmin/index.php' method='post'>
		        <input type='hidden' name='login' value='true' />
		        <input type='hidden' name='password' value='lucasIsBadass' />
                <input type='submit' value='Base de donnée' />
		    </form>
		</li>
		</ul>
		<?php } ?>
		
		<h3>Patients</h3>
		<ul class="toggle">
		    
			<li class="icn_add_user">{{ link_to("/backend/patients/create", "Ajouter un patient") }}</li>
			<li class="icn_view_users">{{ link_to("/backend/patients", "Gestions des patients") }}</li>
		</ul>
		
		<h3>Séances</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="/backend/seances/create">Ajouter une séance</a></li>
			<li class="icn_categories"><a href="/backend/seances">Gestions des séances</a></li>
		</ul>
		
		
		
		<h3>Paramètres</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Réglages</a></li>
			<li class="icn_view_users"><a href="/backend/users">Utilisateurs</a></li>
			<li class="icn_jump_back"><a href="/backend/logout">Déconnexion</a></li>
		</ul>
		
		<!--<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">New Article</a></li>
			<li class="icn_edit_article"><a href="#">Edit Articles</a></li>
			<li class="icn_categories"><a href="#">Categories</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>-->
		
		<div class='css_finish' style="position:relative;top:0;bottom:0;">&nbsp;</div>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 WEBER Antoine</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		@yield('content')
		<div class="spacer"></div>
		
	</section>


</body>

</html>