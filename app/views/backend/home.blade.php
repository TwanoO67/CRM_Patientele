@extends('backend.layout')

@section('titre_page')
Tableau de bord
@stop


@section('fil_ariane')
<?php
    $fil_ariane = array(
        "BORZA Administration" => 'index.html',
        "Tableau de bord" => "/backend/"
    )
?>
@stop

@section('content')
	<h4 class="alert_info">Bienvenue dans votre espace d'administration</h4>

    <article class="module width_full">
			<header><h3>Statistique</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Total</p>
						<p class="overview_count"><?php echo $nb_patients_total; ?></p>
						<p class="overview_type">Patients</p>
						<p class="overview_count"><?php echo $nb_seances_total; ?></p>
						<p class="overview_type">Séances</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">7 jours</p>
						<p class="overview_count"><?php echo $nb_patients_semaine; ?></p>
						<p class="overview_type">Patients</p>
						<p class="overview_count"><?php echo $nb_seances_semaine; ?></p>
						<p class="overview_type">Séances</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
	</article>
	
	
	<article class="module width_full">
	    <header><h3>Statistique 2</h3></header>
	    
	    <div class="module_content">
	<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    
	    </div>
	
</article>
	
	
	
	
	
@stop