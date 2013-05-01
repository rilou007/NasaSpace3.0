
<html>
    <head>
 

        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
            <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
<link rel="stylesheet" type="text/css" href="css/design.css" />
     
        
        <script type="text/javascript">
		var pageImage=0;
		var nbPageImage=0;
		var nbImage=0;
		var nbImageParPage=0;
		$(function(){
			$.getJSON('galri.php?n',function(data){
				nbPageImage=data.nbPage;
				nbImage=data.nbImage;
				nbImageParPage= data.nbImageParPage;
				var content='';
				if(nbPageImage<10){
					for(var i=0;i<nbPageImage;i++){
						content = content+'<input type="button" value="'+(i+1)+'" class="bouton-page"/>';
					}
				}else{
					for(var i=0;i<5;i++){
						content = content+'<input type="button" value="'+(i+1)+'" class="bouton-page"/>';
					}
					content = content+'. . .<span id="bouton-suplement"> ';
					
					content = content+'</span>. . . ';
					for(var i=nbPageImage-5;i<nbPageImage;i++){
						content = content+'<input type="button" value="'+(i+1)+'" class="bouton-page"/>';
					}
				}
				
				$('#les-pages').html(content);
				$('.bouton-page').click(function(){
						chargerPageImage($(this).val()-1);
						pageImage=$(this).val()-1;
					}
				);
			});
			chargerPageImage(0);
		});
		function chargerPageImage(p){
			$.getJSON('galri.php?p='+p,function(data){
				var contenu='';
				for(var i=0; i<data.length; i=i+1){
					var image=data[i];
					var width=image.width;
					var height=image.height;
					var dimAttr=(width>height)?'width="156"':'height="140"';
					if(i%5==0){
						contenu=contenu+'<tr>';
					}
					contenu=contenu+'<td width="170" height="101" align="center" valign="top"><div align="center">';
					contenu=contenu+'<a href="#" class="highslide" onclick="">'
					contenu=contenu + "<img name='' src='"+image.url+"' '"+dimAttr+"' style='width:200px' alt='' onclick='afficher(this);' /></a></div></td>"
					if(i%5==4 || p*5+i==nbImage){
						contenu=contenu+'</tr><tr><td width="170" height="23" align="center" valign="middle"><div align="center"></div></td>';
						contenu=contenu+'<td width="178" align="center" valign="middle"><div align="center"></div></td>';
						contenu=contenu+'<td width="174" align="center" valign="middle"><div align="center"></div></td>';
                        contenu=contenu+'<td width="177" align="center" valign="middle"><div align="center"></div></td>';
                        contenu=contenu+'<td width="172" align="center" valign="middle"><div align="center"></div></td></tr>';
					}
				}
				$('#les-photos').html(contenu=contenu);
			});
		}
		function afficher(path){
	
				var src = path.getAttribute('src');
			//document.write("<iframe src='test.php' width=500px height=400px></iframe>");
			//var dia=document.getElementById("dialog");
			
			
			//var path_iframe ="<iframe border='1' background='green' src='affichage.php?path='"+src+"'width=1000px ;height=600px></iframe>";
			//dia.innerHTML=path_iframe;
			//document.write("<html><body>yesssssyerere</body></html>");
			//window.location.assign('affichage.php?path='+src);
			
					/*$('#dialog').dialog({
					autoOpen: false,
					width: 1060,
					height: 600,
				});
				
				$('#dialog').dialog('open');

				var dialog=document.getElementById("images");
				dialog.setAttribute('src', src)
					"type"     : "POST",
					"url"      : "gallerie.php?imaj='a'",
					"dataType" : "json",
					"cache"    : false,
					"success"  : function(json) {
					}
				
			
		});*/
					

				//$(function ()    {
			$('#dialog').dialog({
            modal: true,
            open: function ()
            {
                $(this).load('affichage.php?path='+src);
            },         
            height: 600,
            width: 1100,
            title: 'Dynamically Loaded Page'
        });
   // });
		
		
		}
		function pageImageSuivante(){
			if(pageImage<nbPageImage-1){
				pageImage=pageImage+1;
				chargerPageImage(pageImage);
				if(pageImage>=5 && pageImage<nbPageImage-5) $('#bouton-suplement').html('<input type="button" value="'+(pageImage+1)+'" class="bouton-page"/>');
				else $('#bouton-suplement').html('');
			}
		}
		function pageImagePrecedente(){
			if(pageImage>0){
				pageImage=pageImage-1;chargerPageImage(pageImage);
				if(pageImage>=5 && pageImage<nbPageImage-5) $('#bouton-suplement').html('<input type="button" value="'+(pageImage+1)+'" class="bouton-page"/>');
				else $('#bouton-suplement').html('');
			}
		}
    </script>

	    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsmI0b9uNWLnRG2HgIG0ALjOiTvIMqLss&sensor=true">
    </script>

	
</head>

										
										
    <body>
	<div id="dialog">
	
	
	</div>
	
	
	
	
        <div class="main_page">
            <div class="content">

<!--<div id="img1" style=" width:500px;height:200px;">-->




</div>
                <div class="whole">


                    <div class="mainbar" align="center">
						
										<table width="94%" height="" align="center">
                                             <tbody id="les-photos">
                                                           
                                             </tbody>
											 
										</table>
													   
													   </div>
                      
        

		
		<form style="background-color:#eadab9">
		  <em>Pages:</em>&nbsp;&nbsp;
		  <input type="button" value="Precedant" onclick="pageImagePrecedente();"/>
		<span id="les-pages"></span>
		<input type="button" value="Suivant" onclick="pageImageSuivante();" /></form>
        <p>&nbsp;</p>
</div>
                </div>
                </div>
        </div>




    </body>
</html>