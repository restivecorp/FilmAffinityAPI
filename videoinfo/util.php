<?php	
	
	/** 
	 * Obtiene los elementos multimedia del directorio
	 */ 
	function getMultimedia($generos) {
		// cine en el raiz
		 $cine = explode("\n", shell_exec("ls -R /www/multimedia/cine | awk ' /:$/&&f{s=$0;f=0} /:$/&&!f{sub(/:$/,\"\");s=$0;f=1;next} NF&&f{ print s\"/\"$0 }' | cut -f 2 -d'_' | cut -f 1 -d'.'"));
				
		// series
		$series = explode("\n", shell_exec("ls /www/multimedia/series/ | cut -f 2 -d'_' | cut -f 1 -d'.'"));
		
		// documentales
		$docs = explode("\n", shell_exec("ls /www/multimedia/documentales/ | cut -f 2 -d'_' | cut -f 1 -d'.'"));
		
		$films = array_merge($cine, $series, $docs);
		
		return $films;
	}	
	


	
	/** 
	 * Obtiene los principales generos de un elemento
	 */ 
	function getGeneros($generos) {
		$todos = explode(" | ", $generos);
		$principales = explode(". ", $todos[0]);

		foreach ($principales as $p) {
			echo $p;
		}
	} 

	/** 
	 * Obtiene los iconos en base al genero
	 */ 	
	function getIcons($generos) {
		$todos = explode(" | ", $generos);
		$principales = explode(". ", $todos[0]);

		foreach ($principales as $p) {
			echo "<img src=\"img/" . ico($p) . ".png\" title=\"".$p." \" alt=\"".$p." \" /> ";
		}
	} 

	/** 
	 * Obtiene los iconos en base al genero
	 */ 
	function ico($genero) {
		$genero = trim($genero);

		if ($genero == "Acción") {
			return "collision";
		}

		if ($genero == "Animación") {
			return "eyes";
		}

		if ($genero == "Aventuras") {
			return "running";
		}

		if ($genero == "Bélico") {
			return "bomb";
		}

		if ($genero == "Ciencia ficción") {
			return "alien";
		}

		if ($genero == "Cine negro") {
			return "black_medium_small_square";
		}

		if ($genero == "Comedia") {
			return "joy";
		}

		if ($genero == "Desconocido") {
			return "gift";
		}

		if ($genero == "Documental") {
			return "video_camera";
		}

		if ($genero == "Drama") {
			return "disappointed_relieved";
		}

		if ($genero == "Fantástico") {
			return "fireworks";
		}

		if ($genero == "Infantil") {
			return "baby";
		}

		if ($genero == "Intriga") {
			return "mag_right";
		}

		if ($genero == "Musical") {
			return "microphone";
		}

		if ($genero == "Romance") {
			return "heart";
		}

		if ($genero == "Serie de TV") {
			return "tv";
		}

		if ($genero == "Terror") {
			return "ghost";
		}

		if ($genero == "Thriller") {
			return "busts_in_silhouette";
		}

		if ($genero == "Western") {
			return "horse";
		}
		
		if ($genero == "Película") {
			return "seat";
		}
		
		if ($genero == "info") {
			return "raising_hand";
		}
		
		if ($genero == "borrar") {
			return "heavy_multiplication_x";
		}
		
		return $genero;
	}
	
?>
