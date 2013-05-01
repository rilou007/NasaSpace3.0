<?php
	session_start();
    require_once("rs.php");
	$bd= new Rs();
	$h=0;
    
	$pictures_count = 30;
	
	$tabLat = array();
	$tabLon = array();
    $tab = array();
    $tab1 = array();
    $tab2 = array();
	$tab3 = array();
	
	//$tab4 = array();
    $requete=$bd->Select('SELECT f.id id_file, lat, lon, url, geon, feat, description FROM files f left outer join metadata m on f.id= m.id_file LIMIT 30');
	foreach ($requete as $val)
	{
		$tabLon[$h] = $val['lon'];//$lon;
		$tabLat[$h] = $val['lat'];//$lat;
		$tab[$h] = $val['url'];//$path;
		$tab1[$h] = $val['geon'];//$country;
		$tab2[$h] = $val['feat'];//$desc;
		$tab3[$h] = $val['description'];//for the description
		//$tab4[$h] = $val['id_file'];// to know which specific file is concerned, so we can load related comments/tags
		$h++;
	}
	
    //This part is to select comments/tags
    //$commentCount = 5;
?>
<!DOCTYPE html>
    <html>
        <head>
            <?php
				if(isset($_SESSION['username']))
					{
						?><title>Hi <?php echo $_SESSION['username'];?></title><?php
					}
				else
					{
						?><title> Nasa space explorer </title><?php
					}
			?>
			
			<style type="text/css">
				body {background: url(images/patt.jpg) repeat 0 top;}
				.clear {clear:both;}
			</style>
            <link rel="stylesheet" type="text/css" href="style1.css" />
            <link rel="stylesheet" type="text/css" href="style2.css" />
            <link rel="stylesheet" type="text/css" href="style1_.css" />
            <link rel="stylesheet" type="text/css" href="style2_.css" />
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="jquery.js"></script>
            <script type="text/javascript">
               function example_ajax_request() {
                  $('#example-placeholder').html('<p><img src="img/ajax-loader.gif"/></p>');
                  $('#example-placeholder').load("<div>BONJOUR</div>");
                }
				
				
			$(document).ready(function() {
				
				var latlng = new google.maps.LatLng(<?php echo (int)$tabLat[0];?>,<?php echo (int)$tabLon[0];?>);		
				var latlng1 = new google.maps.LatLng(<?php echo (int)$tabLat[1];?>,<?php echo (int)$tabLon[1];?>);		
				var latlng2 = new google.maps.LatLng(<?php echo (int)$tabLat[2];?>,<?php echo (int)$tabLon[2];?>);		
				var latlng3 = new google.maps.LatLng(<?php echo (int)$tabLat[3];?>,<?php echo (int)$tabLon[3];?>);		
				var latlng4 = new google.maps.LatLng(<?php echo (int)$tabLat[4];?>,<?php echo (int)$tabLon[4];?>);		
				var latlng5 = new google.maps.LatLng(<?php echo (int)$tabLat[5];?>,<?php echo (int)$tabLon[5];?>);		
				var latlng6 = new google.maps.LatLng(<?php echo (int)$tabLat[6];?>,<?php echo (int)$tabLon[6];?>);		
				var latlng7 = new google.maps.LatLng(<?php echo (int)$tabLat[7];?>,<?php echo (int)$tabLon[7];?>);		
				var latlng8 = new google.maps.LatLng(<?php echo (int)$tabLat[8];?>,<?php echo (int)$tabLon[8];?>);		
				var latlng9 = new google.maps.LatLng(<?php echo (int)$tabLat[9];?>,<?php echo (int)$tabLon[9];?>);		
				var latlng10 = new google.maps.LatLng(<?php echo (int)$tabLat[10];?>,<?php echo (int)$tabLon[10];?>);		
				var latlng11 = new google.maps.LatLng(<?php echo (int)$tabLat[11];?>,<?php echo (int)$tabLon[11];?>);		
				
				var myOptions = {
					zoom: 11, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions1 = {
					zoom: 11, center: latlng1, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions2 = {
					zoom: 11, center: latlng2, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions3 = {
					zoom: 11, center: latlng3, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions4 = {
					zoom: 11, center: latlng4, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions5 = {
					zoom: 11, center: latlng5, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions6 = {
					zoom: 11, center: latlng6, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions7 = {
					zoom: 11, center: latlng7, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions8 = {
					zoom: 11, center: latlng8, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions9 = {
					zoom: 11, center: latlng9, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions10 = {
					zoom: 11, center: latlng10, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var myOptions11 = {
					zoom: 11, center: latlng11, mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				
				var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				var map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions1);
				var map = new google.maps.Map(document.getElementById("map_canvas3"), myOptions2);
				var map = new google.maps.Map(document.getElementById("map_canvas4"), myOptions3);
				var map = new google.maps.Map(document.getElementById("map_canvas5"), myOptions4);
				var map = new google.maps.Map(document.getElementById("map_canvas6"), myOptions5);
				var map = new google.maps.Map(document.getElementById("map_canvas7"), myOptions6);
				var map = new google.maps.Map(document.getElementById("map_canvas8"), myOptions7);
				var map = new google.maps.Map(document.getElementById("map_canvas9"), myOptions8);
				var map = new google.maps.Map(document.getElementById("map_canvas10"), myOptions9);
				var map = new google.maps.Map(document.getElementById("map_canvas11"), myOptions10);
				var map = new google.maps.Map(document.getElementById("map_canvas12"), myOptions11);
						
			});
			
            </script>
	    <!--Adding Verification code-->
	    <script>

			function surligne(champ, erreur)
				{
					if(erreur)
						champ.style.backgroundColor = "#fba";
					else
						champ.style.backgroundColor = "";
				}
			
			function erreurConn(champ, erreur)
				{
					if(erreur)
						champ.value= "Il y a erreur dans vos identifiants...";
					else
						champ.style.backgroundColor = "";
				}

			function verifNom(champ)
				{
					if(champ.value.length < 1)
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}

			function verifMail(champ)
				{
					var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
					if(!regex.test(champ.value))
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}
				
				
			function verifPass(champ)
				{
					if(champ.value.length < 1 || champ.value.length > 20)
						{
							surligne(champ, true);
							return false;
						}
					else
						{
							surligne(champ, false);
							return true;
						}
				}
				
			function verifPass1(pass, confPass)
				{
					if(confPass.value.length < 1 || confPass.value.length > 20)
						{
							surligne(confPass, true);
							return false;
						}
					else
						{
							if(confPass.value === pass.value)
								{
									surligne(confPass, false);
									return true;
								}
							else
								{
									surligne(confPass, true);
									return false;
								}
						}
				}
			
				
			function verifForm(f)
				{
					var nomOk = verifNom(f.nom);
					var mailOk = verifMail(f.mail);
					var passOk = verifPass(f.motDePasse);
					
					if(nomOk && passOk && mailOk)
						return true;
					else
						{
							alert("Rassurez-vous d'avoir fourni toutes les informations requises!");
							return false;
						}
				}
				
		
	</script>
	    <!--Adding JQUERY ANIMATION -->
            <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.bgscroll.js"></script>
		<script type="text/javascript">
		
			$( function() {
				$('body').bgscroll({scrollSpeed:1 , direction:'h' });
			});
			
			$(function(){
				// Dialog 1			
				$('#dialog1').dialog({
					autoOpen: false,
					width: 1060,
					height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link1
				$('#dialog_link1').click(function(){
					$('#dialog1').dialog('open');
					return false;
				});
                                /////////////////////
                                // Dialog 2			
				$('#dialog2').dialog({
					autoOpen: false,
					width: 1060,
					height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link2').click(function(){
					$('#dialog2').dialog('open');
					return false;
				});
                                ///// Dialog 3			
				$('#dialog3').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link3').click(function(){
					$('#dialog3').dialog('open');
					return false;
				});
                                ///// Dialog 4			
				$('#dialog4').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link
				$('#dialog_link4').click(function(){
					$('#dialog4').dialog('open');
					return false;
				});
                                ///// Dialog 5			
				$('#dialog5').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 5
				$('#dialog_link5').click(function(){
					$('#dialog5').dialog('open');
					return false;
				});
                                ///// Dialog 6			
				$('#dialog6').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 6
				$('#dialog_link6').click(function(){
					$('#dialog6').dialog('open');
					return false;
				});
                                ///// Dialog 7			
				$('#dialog7').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 7
				$('#dialog_link7').click(function(){
					$('#dialog7').dialog('open');
					return false;
				});
                                ///// Dialog 8			
				$('#dialog8').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 8
				$('#dialog_link8').click(function(){
					$('#dialog8').dialog('open');
					return false;
				});
                                ///// Dialog 9			
				$('#dialog9').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 9
				$('#dialog_link9').click(function(){
					$('#dialog9').dialog('open');
					return false;
				});
                                ///// Dialog 10			
				$('#dialog10').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 10
				$('#dialog_link10').click(function(){
					$('#dialog10').dialog('open');
					return false;
				});
                                ///// Dialog 11			
				$('#dialog11').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 11
				$('#dialog_link11').click(function(){
					$('#dialog11').dialog('open');
					return false;
				});
                                ///// Dialog 12			
				$('#dialog12').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 12
				$('#dialog_link12').click(function(){
					$('#dialog12').dialog('open');
					return false;
				});
				
				///// Dialog 13		
				$('#dialog13').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 13
				$('#dialog_link13').click(function(){
					$('#dialog13').dialog('open');
					return false;
				});
				
				///// Dialog 14			
				$('#dialog14').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 14
				$('#dialog_link14').click(function(){
					$('#dialog14').dialog('open');
					return false;
				});
				
				///// Dialog 15			
				$('#dialog15').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 15
				$('#dialog_link15').click(function(){
					$('#dialog15').dialog('open');
					return false;
				});
				
				///// Dialog 16			
				$('#dialog16').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 16
				$('#dialog_link16').click(function(){
					$('#dialog16').dialog('open');
					return false;
				});
				
				///// Dialog 17			
				$('#dialog17').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 17
				$('#dialog_link17').click(function(){
					$('#dialog17').dialog('open');
					return false;
				});
				
				///// Dialog 18			
				$('#dialog18').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 18
				$('#dialog_link18').click(function(){
					$('#dialog18').dialog('open');
					return false;
				});
				
				///// Dialog 19			
				$('#dialog19').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 19
				$('#dialog_link19').click(function(){
					$('#dialog19').dialog('open');
					return false;
				});
				
				///// Dialog 20			
				$('#dialog20').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 20
				$('#dialog_link20').click(function(){
					$('#dialog20').dialog('open');
					return false;
				});
                                ///
								
				$('#dialog21').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 21
				$('#dialog_link21').click(function(){
					$('#dialog21').dialog('open');
					return false;
				});
                                ///// Dialog 22			
				$('#dialog22').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 22
				$('#dialog_link22').click(function(){
					$('#dialog22').dialog('open');
					return false;
				});
				
				///// Dialog 23		
				$('#dialog23').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 23
				$('#dialog_link23').click(function(){
					$('#dialog23').dialog('open');
					return false;
				});
				
				///// Dialog 24			
				$('#dialog24').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 24
				$('#dialog_link24').click(function(){
					$('#dialog24').dialog('open');
					return false;
				});
				
				///// Dialog 25			
				$('#dialog25').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 25
				$('#dialog_link25').click(function(){
					$('#dialog25').dialog('open');
					return false;
				});
				
				///// Dialog 26			
				$('#dialog26').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 26
				$('#dialog_link26').click(function(){
					$('#dialog26').dialog('open');
					return false;
				});
				
				///// Dialog 27			
				$('#dialog27').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 27
				$('#dialog_link27').click(function(){
					$('#dialog27').dialog('open');
					return false;
				});
				
				///// Dialog 28			
				$('#dialog28').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 28
				$('#dialog_link28').click(function(){
					$('#dialog28').dialog('open');
					return false;
				});
				
				///// Dialog 29			
				$('#dialog29').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 29
				$('#dialog_link29').click(function(){
					$('#dialog29').dialog('open');
					return false;
				});
				
				///// Dialog 30			
				$('#dialog30').dialog({
					autoOpen: false,
					width: 1060,
                                        height: 600,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
				
				// Dialog Link 30
				$('#dialog_link30').click(function(){
					$('#dialog30').dialog('open');
					return false;
				});
                                ///
                                
                                ///Login
                                // login			
				$('#login').dialog({
					autoOpen: false,
					width: 525,
					resizable: false,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
                                // Dialog Link
				$('#login_link').click(function(){
					$('#login').dialog('open');
					return false;
				});
				
				// Register			
				$('#register').dialog({
					autoOpen: false,
					width: 500,
					resizable: true,
					/*buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}*/
				});
                                // Register Link
				$('#register_link').click(function(){
					$('#register').dialog('open');
					return false;
				});
			});
			
			function see_map(lat,lon,feat) {
				var url = 'map.php?lat='+lat+'&lon='+lon+'&feat='+feat;
			    window.location.assign(url);
			}
		</script>
		<style type="text/css">
			body {background: url(images/patt.jpg) repeat 0 top;}
			.clear {clear:both;}
		</style>
        </head>
        <body>
			<?php include("api.php");?>
            <div id="global">
                <div id="top_bar_head">
                    <div class="name_container">
                        <img src="img/g3969.png" alt="logo" style="width: 145px; height: 100px;float: left; margin-right: 5px; margin-top:5px;" />
                        <br/><br/><a style="font-size: 25px; font-weight: bold; "><h2>Space Explorer</h2></a>
                    </div>

                    <div class="search_container">
                        <div class="block_registrer">
                            <?php
								if(isset($_SESSION['username']))
									{
										?> <a href="logout.php" id="login_link1" class="ui-state-default ui-corner-all">Logout</a><?php
									}
								else
									{
										?> <a id="login_link" class="ui-state-default ui-corner-all">Login</a><?php
									}
							?>
                            <a id="register_link" class="ui-state-default ui-corner-all">REGISTER</a>
							<a href="gallery.php" id="login_link1" class="ui-state-default ui-corner-all">GALLERY</a>
							<a id="login_link">FRENCH</a>
                            <!--a id="login_link">FRENCH</a-->
                        </div>
                       
						 <div id="login" title="LOGIN">
							<form method="post" action="login_post.php">
								<img src="img/bg_world_login.jpg" alt="" style="margin-bottom: 5px;"/>
								<div class="input_block">   
									<label class="for_label">USERNAME</label>
									<input type="text" alt="" class="for_input" name="userName" placeholder="Username"/>
								</div>
								<div class="input_block">
									<label class="for_label">PASSWORD</label>
									<input type="password" alt="" name="password" class="for_input"/>
								</div>
							
								<input type="submit" class="for_submit" alt="" value="LOGIN"/>
								
								<a href="">Forgot your password?</a><br/>
								<a href="registration/account.php">Create an Account.</a>
						 </form>
						 </div>
			
						 <div id="register" title="REGISTER">
							<form onSubmit="return verifForm(this)" method="post" action="register_post.php">
								<div class="input_block">   
									<label class="for_label">USERNAME</label>
									<input type="text" alt="" class="for_input" name="userName" onBlur="verifNom(this)"/>
								</div>
								
								<div class="input_block">
									<label class="for_label">EMAIL</label>
									<input type="text" alt="" class="for_input" name="email" onBlur="verifMail(this)"/>
								</div>
							
								<div class="input_block">
									<label class="for_label">PASSWORD</label>
									<input type="password" alt="" class="for_input" name="password" onBlur="verifPass(this)"/>
								</div>
								
								<div class="input_block">
									<label class="for_label">CONFIRM PASSWORD</label>
									<input type="password" alt="" class="for_input" name="cpassword" onBlur="verifPass1(password,this)"/>
								</div>
							
								<input type="submit" class="for_submit" alt="" value="REGISTER"/>
						  </form>
						 </div>
                       
						<div id="searchbox">
							<!--form method="post" action="recherche_post.php"-->
							<form method="post" action="index.php">
								<input id="search" type="text" name="recherche" placeholder="Type here" />
								<input id="submit" name="search_" type="submit" value="Search" />
							</form>
							
							<?php 
								if (isset($_POST['search_']))// and isset($_POST['recherche']))
								{
									header('Location: search/gallerie.php');//?search_subject='.$_POST['search_']);
								}
							?>
						</div>
                        
                    </div> 
                </div>
                
                <div id="head">
                    
                </div>
                
                <div id="content">
                    <div id="left_pane">
                        <div class="block">
                            <?php 
								for($i=0;$i<$pictures_count;$i++)
								{
									echo '
									<a href="" class="img_back1 blow" style="background: url('.$tab[$i].') no-repeat center center;" id="dialog_link'.($i+1).'" class="ui-state-default ui-corner-all">
										<div class="bottom_span_text">'.$tab2[$i]." <br/><small>".$tab1[$i].'</small></div>
										<div class="bottom_span"></div>
									
										<div style="display: table;" id="dialog'.($i+1).'" title="'.$tab2[$i].",<small><i>".$tab1[$i].'</i></small>">		
											<p>'.$tab3[$i].'</p>
											
											<div style="width: 500px; height: 600px; background: red; float: left;">
												<img src="'.$tab[$i].'" alt="" width="100%" style="float: right;"/>
												Assigned Tags:
												<div class="bottom_of_img">';
												$k = 0;
												$requete2=$bd->Select('SELECT tags_name FROM tags where path_file="'.$tab[$i].'" ORDER by tags_name');
												echo '<center><table><tr>';
												foreach ($requete2 as $val2)
												{
													$k++;
													if (($k%4)==1)
														echo '</tr><tr><td align="right">-'.$val2['tags_name'].' </td>';
													else
														echo '<td align="right">-'.$val2['tags_name'].'</td>';								
												}
												  echo '</tr></table></center>
													<form action="tag_post.php" method="post">
													 <label>Tag</label>
													 <input type="text" name="tag"/> <input type="hidden" value="'.$tab[0].'" name="file">
													 <input type="submit" name="" value="Add Tag"/>
													</form>
												</div>
											</div>
											<!-- FOR THE MAP-->
											<div style="width: 500px; height: 30px; background: #000; margin-left: 10px; margin-bottom: 10px; display: inline-block;">
											  <center><input type="button" value="See the Related Map" onclick="see_map('.$tabLat[$i].','.$tabLon[$i].',\''.$tab2[$i].'\')" /></center>
											</div>
											<!-- END THE MAP-->
							
											<!--for textarea-->
											<div style="background: #000; width: 500px; margin-left: 10px; height: 285px; margin-bottom: 10px; display: inline-block; overflow: auto;">';
												$requete3=$bd->Select('SELECT comment, date_comment, username FROM comments where publish=1 and path_file="'.$tab[$i].'" ORDER by date_comment desc LIMIT 15');//SELECT lat, lon, url, geon, feat, description FROM files f left outer join metadata m on f.id= m.id_file where f.id>=12 LIMIT 12');
												foreach ($requete3 as $val3)
												{
													echo '
													<div class="" style="margin-bottom: 5px; width: 100%; min-height: 50px; background: yellow;">
														<span style="border: 1px solid #000; float: left; width: 80px; height: 50px;"><b>'.$val3['username'].'</b></span> 
														<span style="border: 1px solid #000; float: left; width: 300px; height: 50px;">'.$val3['comment'].'</span>
														<span style="border: 1px solid #000; float: left; width: 75px; height: 50px;">
														 <form>
														   <input type="submit" name="" value="+" style="width: 10px; height: 10px; float: right;" title="Signaler" />
														 </form> 
														<hr/>
														   <small>'.$val3['date_comment'].'</small>
														</span>
													</div>';
												}
													echo '
													<form style="margin-bottom: 2px; width: 100%; min-height: 50px; background: red;" action="comment_post.php" method="post">
													   <center><input type="text" size="58px" name="comment"/> <input type="hidden" value="'.$tab[$i].'" name="file">
													   <input type="submit" name="" value="Add comment"/> </center>
													 </form>
											</div>
											<!--END textarea-->
						   
										</div>
									</a>';
								}
                            ?>
						</div>
    
					</div>
                    
                    <!--<div id="right_pane">
                        
                    </div>-->
                </div>
            </div>
            <div id="footer">
                  <a style="color: #fff;">Copyright ESIH 2013 | </a>  <a>Help | </a> <a> Community</a>
            </div>
        </body>
    </html>
