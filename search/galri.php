<?php
	session_start();
    require_once("../rs.php");
	$bd= new Rs();
	if isset($_GET['search_subject'])$search_subject = $_GET['search_subject'];
	$nbImageParPage=15;
	if(isset($_GET['n'])){
		$i=0;
		
			//try
				//{
				//$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				//$bd=new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
				//}catch (Exception $e){die('Erreur de connection');}
				
				$requete=$bd->Select('SELECT f.feat, f.lat, f.lon, f.geon, f.url/*f.mission, ym.year_mission, f.url, t.tags_name FROM files f LEFT JOIN metadata m ON (m.id = f.id) LEFT JOIN tags t ON (t.id = f.id) LEFT JOIN year_mission ym ON (ym.mission = f.mission) WHERE f.mission LIKE "'.$search_subject.'" OR ym.year_mission LIKE '.$search_subject.' OR f.url LIKE '.$search_subject.' OR t.tags_name LIKE '.$search_subject);
				//$requete->execute(array($username));
				foreach ($requete as $val)
				{
					$path=$val['url'];
					$width=$val['width'];
					$height=$val['height'];
					//$info=pathinfo($path);
					$i++;
				}
				//while($val=$requete->fetch()){
				
				//$name=$val['name'];
				//$path=$val['url'];
				//$width=$val['width'];
				//$height=$val['height'];
				//$info=pathinfo($path);
				//$i++;
				//}

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
		
		
		//try
			//	{
			//	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			//	$bd=new PDO('mysql:host=localhost;dbname=logipamo_nasa','logipamo_esih','esih007',$pdo_options);
			//	}catch (Exception $e){die('Erreur de connection');}
				$requete=$bd->Select('SELECT width,height,url FROM files');
	foreach ($requete as $val)
	{
				//$requete=$bd->query('');
				//$requete->execute(array($username));
				
				///while($val=$requete->fetch()){
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
