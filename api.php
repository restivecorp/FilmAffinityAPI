<?php	
	/* Global variables to define filmaffinity connection */
	$base_url = "https://www.filmaffinity.com/";
	$country = "es/"; // default value spain
	$prefix = "film";
	$sufix =".html";


	if(isset($_GET['filmcode'])) {
   		$data = getFilmInfo($_GET['filmcode'], false);
   		print_r($data);
	}

	/* 
		Returns info for String parameter := filmaffinity code
		$json parameter = true, returns data in json mode, else return film class
	 */
	function getFilmInfo($film_code, $json) {
		$data = extractInfoFromFA($film_code);

		if ($json) {
			return json_encode($data);
		}
		return $data;
	}

	/* 
		Returns info for Array parameter := filmaffinity code 1, filmaffinity code 2, ... 
		$json parameter = true, returns data in json mode, else return film class
	*/
	function getFilmsInfo($films_codes, $json){
		$data = array();
		foreach ($films_codes as $f) {
			if (is_numeric($f)) {
				array_push($data, getFilmInfo($f, $json));
			}
			continue;				
		}
		return $data;
	}


	/* Parse HTML to extract and return data */
	function extractInfoFromFA($film) {
		// get html
		$html = getInfoFromFA($film);

		// create dom
		$doc = new DOMDocument();
		@$doc->loadHTML($html);
		
		// parse dom
		$dts = $doc->getElementsByTagName('dt');
		$dds = $doc->getElementsByTagName('dd');

		// film attributes
		$poster = ""; 
		$title = "";
		$average = "";
		$votes = "";
		$year = "";
		$country = "";
		$flag = "";
		$running = "";
		$genere = "";
		$synopsis = "";
		$producer = "";
		$director = "";
		$cast = "";
		$link = "";

		for ($i = 0; $i < $dts->length-4; $i++) {	
			$str1=$dts->item($i)->nodeValue;
			$str2=$dds->item($i)->nodeValue;

			if($str1 == "Año" || $str1 == "AÃ±o"){
				$year = $str2;
			}
			
			if($str1 == "País" || $str1 == "PaÃ­s"){
				$country = $str2;
				$flag = $GLOBALS['base_url'].$dds->item($i)->firstChild->firstChild->attributes->getNamedItem('src')->nodeValue;
			}

			if($str1 == "Duración" || $str1 == "DuraciÃ³n"){
				$running = $str2;
			}
			
			if($str1 == "Género" || $str1 == "GÃ©nero"){
				$genere = $str2;
			}

			if($str1 == "Sinopsis"){
				$synopsis = $str2;
			}

			if($str1 == "Productora"){
				$producer = $str2;
			}

			if($str1 == "Director"){
				$director = $str2;
			}
			
			if($str1 == "Reparto"){
				$cast = $str2;
			}

		}
		
		$poster = $doc->getElementById('movie-main-image-container')->getElementsByTagName('img')->item(0)->attributes->getNamedItem('src')->nodeValue;		
		$title = $doc->getElementById('main-title')->nodeValue;
		$average = $doc->getElementById('movie-rat-avg')->nodeValue;
		$votes = $doc->getElementById('movie-count-rat')->getElementsByTagName('span')->item(0)->nodeValue;
		$link = $GLOBALS['base_url'].$GLOBALS['country'].$GLOBALS['prefix'].$film.$GLOBALS['sufix'];
		
		return new Film($poster, $title, $average, $votes, $year, $country, $flag, $running, $genere, $synopsis, $producer, $director, $cast, $link);
	}


	/* Open filmaffinity and gets the page of selected film */
	function getInfoFromFA($film_code) {
		$url = $GLOBALS['base_url'].$GLOBALS['country'].$GLOBALS['prefix'].$film_code.$GLOBALS['sufix'];

	    $ch = curl_init();
	    
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    
	    $film_data = curl_exec($ch);
	    
	    curl_close($ch);
	    
	    return $film_data;
	}

?>

<?php
	class Film{
	    public $poster = ""; 
		public $titleSmall = "";
		public $tipo = "";
		public $title = "";
		public $average = "";
		public $votes = "";
		public $year = "";
		public $country = "";
		public $flag = "";
		public $running = "";
		public $genere = "";
		public $synopsis = "";
		public $producer = "";
		public $director = "";
		public $cast = "";
		public $link = "";
	 
	    public function __construct($arg_poster, $arg_title, $arg_average, $arg_votes, $arg_year, $arg_country, $arg_flag, $arg_running, $arg_genere, $arg_synopsis, $arg_producer, $arg_director, $arg_cast, $arg_link){
	        $this->poster = trim($arg_poster); 
	        $this->title = trim($this->reemplaceSpecials($arg_title)); 
	        $this->average = trim($arg_average); 
	        $this->votes = trim($arg_votes); 
	        $this->year = trim($arg_year); 
	        $this->country = trim($this->reemplaceSpecials($arg_country)); 
	        $this->flag = trim($arg_flag); 
	        $this->running = trim($arg_running); 
	        $this->genere = trim($this->reemplaceSpecials($arg_genere)); 
	        $this->synopsis = trim($this->reemplaceSpecials($arg_synopsis)); 
	        $this->producer = trim($this->reemplaceSpecials($arg_producer)); 
	        $this->director = trim($this->reemplaceSpecials($arg_director)); 
	        $this->cast = trim($this->reemplaceSpecials($arg_cast)); 
	        $this->link = trim($arg_link); 

			$this->tipo = "Película";

			if(strpos($this->title, "(Serie de TV)")){
				$this->title = str_replace("(Serie de TV)", "",$this->title);
				$this->tipo = "Serie";
			}

			if(strpos($this->title, "(TV)")){
					$this->title = str_replace(" (TV)", "", $this->title);
				$this->tipo = "Documental";
				}

			if(strlen($this->title) > 35) {
				$this->titleSmall = substr($this->title, 0, 35) . "...";
			}else {
				$this->titleSmall = $this->title;
			}

	    }
	   

	   function reemplaceSpecials($word) {
	   	$word = str_replace("Ã¡", "á", $word);
	   	$word = str_replace("Ã©", "é", $word);
	   	$word = str_replace("Ã­", "í", $word);
	   	//$word = str_replace("Ã", "í", $word);
	   	$word = str_replace("Ã³", "ó", $word);
	   	$word = str_replace("Ãº", "ú", $word);
	   	$word = str_replace("Ã±", "ñ", $word);

	   	$word = str_replace("Ã", "Á", $word);
	   	$word = str_replace("Ã‰", "É", $word);
	   	//$word = str_replace("Ã", "Í", $word);
	   	$word = str_replace("Ã“", "Ó", $word);
	   	$word = str_replace("Ãš", "Ú", $word);
	   	$word = str_replace("Ã'", "Ñ", $word);

		$word = str_replace("Á¼", "ü", $word);
	   	return $word;
	   }
	}
?>
