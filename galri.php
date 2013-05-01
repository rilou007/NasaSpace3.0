<?php

	
	$nbImageParPage=15;
	if(isset($_GET['n'])){
		$i=0;
		
			try
				{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bd=new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
				}catch (Exception $e){die('Erreur de connection');}
				
				$requete=$bd->query('SELECT width,height,url FROM files');
				//$requete->execute(array($username));
				while($val=$requete->fetch()){
				//$name=$val['name'];
				$path=$val['url'];
				$width=$val['width'];
				$height=$val['height'];
				//$info=pathinfo($path);
				$i++;
				}

		header('content-type:text/plain');
		$data=array(
				'nbPage'=>ceil($i/$nbImageParPage),
				'nbImageParPage'=>$nbImageParPage,
				'nbImage'=>$i
			);
		echo json_encode($data);
	}else{
		if(isset($_GET['p'])) $page=$_GET['p'];
		else $page=0;
		
		
		$lesToiles=array();
		$i=0;
		
		
		try
				{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bd=new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
				}catch (Exception $e){die('Erreur de connection');}
				
				$requete=$bd->query('SELECT width,height,url FROM files');
				//$requete->execute(array($username));
				while($val=$requete->fetch()){
				//$name=$val['name'];
				$path=$val['url'];
				$width=$val['width'];
				$height=$val['height'];
				//$info=pathinfo($name);
			
				//list($width, $height, $type, $attr) = getimagesize('images/album/toiles/'.$name);
				$toile=array(
						'url'=> $path,
						'width'=>$width,
						'height'=>$height
					);
				if($i>=$page*$nbImageParPage and $i<($page+1)*$nbImageParPage) $lesToiles[]=$toile;
				$i++;
				
				}
				

		header('content-type:text/plain');
		echo json_encode($lesToiles);
	}

		
		?>
