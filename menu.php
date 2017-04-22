<?php session_start();?>
<html>
<head>
  <title>CityRun</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset=utf-8>
    <meta name=description content="">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
  <script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.0.min.js"></script>
  </script>
</head>
<body>
  <div class="header">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-5">
    					<!-- Logo -->
    					<div class="logo">
    						 <a class="navbar-brand navbar-brand-centered" href="#"><img src="img/ciry_run.png" width="120" height="90" alt="placeholder+image"></a>
    					</div>
    				</div>
    				<div class="col-md-5">
    					<div class="row">
    						<div class="col-lg-12">

    						</div>
    					</div>
    				</div>
    				<div class="col-md-2">
    					<div class="navbar navbar-inverse" role="banner">
    						<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
    							<ul class="nav navbar-nav">
    								<li class="dropdown">
    									<a href="#" class="dropdown-toggle">Logout</a>
    								</li>
    							</ul>
    						</nav>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="page-content">
    		<div class="row">
    			<div class="col-md-2">
    				<div class="sidebar content-box" style="display: block;">
    					<ul class="nav">
    						<!-- Main menu -->
                <?php
                $user_checkpoint = $_SESSION['user_checkpoint'];
                    switch ($user_checkpoint) {
                       case "1":
                           echo "<li class='current'><button id='1'>Варна</button></li>
                                 <li class='current'><button id='2' disabled>Търново</button></li>
                                 <li class='current'><button id='3' disabled>Пловдив</button></li>
                                 <li class='current'><button id='4' disabled>София</button></li>
                                 <li class='current'><button id='5' disabled>Враца</button></li>
                           ";
                           break;
                       case "2":
                           echo "<li class='current'><button id='1'>Варна</button></li>
                                 <li class='current'><button id='2'>Търново</button></li>
                                 <li class='current'><button id='3' disabled>Пловдив</button></li>
                                 <li class='current'><button id='4' disabled>София</button></li>
                                 <li class='current'><button id='5' disabled>Враца</button></li>
                           ";
                           break;
                       case "3":
                           echo "<li class='current'><button id='1'>Варна</button></li>
                                 <li class='current'><button id='2'>Търново</button></li>
                                 <li class='current'><button id='3'>Пловдив</button></li>
                                 <li class='current'><button id='4' disabled>София</button></li>
                                 <li class='current'><button id='5' disabled>Враца</button></li>
                           ";
                           break;
                           case "4":
                               echo "<li class='current'><button id='1'>Варна</button></li>
                                     <li class='current'><button id='2'>Търново</button></li>
                                     <li class='current'><button id='3'>Пловдив</button></li>
                                     <li class='current'><button id='4'>София</button></li>
                                     <li class='current'><button id='5' disabled>Враца</button></li>
                               ";
                               break;
                               case "5":
                                   echo "<li class='current'><button id='1'>Варна</button></li>
                                         <li class='current'><button id='2'>Търново</button></li>
                                         <li class='current'><button id='3'>Пловдив</button></li>
                                         <li class='current'><button id='4'>София</button></li>
                                         <li class='current'><button id='5'>Враца</button></li>
                                   ";
                                   break;
                       default:
                           echo "Your favorite color is neither red, blue, nor green!";
                    }
                    ?>

    						<!-- <li class="current"><a href="index.html"> <p style="font-size:12px; text-align:center;"> Ниво 1 </p> Варна</a></li>
    						<li class="current"><a href="index.html"> <p style="font-size:12px ; text-align:center;"> Ниво 2 </p> Търново</a></li>
    						<li class="current"><a href="index.html"> <p style="font-size:12px; text-align:center;"> Ниво 3 </p> Пловдив</a></li>
    						<li class="current"><a href="index.html"> <p style="font-size:12px; text-align:center;"> Ниво 4 </p>София </a></li>
    						<li class="current"><a href="index.html"><p style="font-size:12px; text-align:center;"> Ниво 5 </p> Враца</a></li> -->
    					</ul>
    				</div>
    			</div>
    			<div class="col-md-10">
    				<div id="maps">
            <img id="maps_img"></img></div>
            <div> <div id="info"></div> <a href="game.phps"><input type="submit" id="start" style="visibility: hidden" value="Старт"></a></div>
    			</div>
    		</div>
    	</div>



    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- <button id="1" name="test"> adad </button> -->
  <input type="hidden" id="hidd" value="">
<script>
  $("button").mouseup(
    function() {
      var btn_id = $(this).attr('id');
      //alert(btn_id);
      $('#hidd').attr("value", btn_id);
      var index = $('#hidd').attr("value");
      $('#maps_img').attr("src",'images/maps/map'+index+'.png')
      $("#info").load("info/map"+index+".txt");
      $('#start').css('visibility', 'visible');

    }
  );

</script>
</body>

</html>
