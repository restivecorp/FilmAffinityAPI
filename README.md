# FilmAffinityAPI
Simple API to extract information from FilmAffinity

## What is it?
It is a simple script PHP to extract basic information from a movie website FilmAffinity

Through the code of the film, the script connects to FilAffinity and download a number of attributes, which returns a PHP class or json format.

What is the code of the movie? It's a FilmAffinity code. For example in: https://www.filmaffinity.com/es/filmXXXXXX.html the code would be XXXXXX. With that the script download the basic attributes

Which are the attributes to extract? In this simple script only some attributes are extracted, but can be extended to cover all of them. Currently the following are extracted :
* poster
* title
* average
* year
* country
* flag
*	running
* genere
* synopsis
* producer
* $director
* $cast
* link

## How does it work?
The script has two functions one to extract the contents of a given film, and other for multiple movies:
* function getFilmInfo($film_code, $json){ ... }
* function getFilmsInfo($films_codes, $json){ ... }

By default the script connects to FilmAffinity Spain, it can be changed very easily by modifying attribute $country = "es/"; and all if conditions, to extract content, for example:

 > $country = "es/"; replace by $country = "en/";
 
 > if($str1 == "Año" || $str1 == "AÃ±o"){ ... replace by if($str1 == "Year" ){ ...
 
 > if($str1 == "País" || $str1 == "PaÃ­s"){ ... replace by if($str1 == "Country" ){ ...
 
 > if($str1 == "Duración" || $str1 == "DuraciÃ³n"){ ... replace by if($str1 == "Running Time" ){ ...
 
 > if($str1 == "Género" || $str1 == "GÃ©nero"){ ... replace by if($str1 == "Genere" ){ ...
 
 > if($str1 == "Sinopsis"){ ... replace by if($str1 == "Synopsis / Plot" ){ ...
 
 > if($str1 == "Productora"){ ... replace by if($str1 == "Producer" ){ ...
 
 > if($str1 == "Director"){ ... replace by if($str1 == "Director" ){ ...
 
 > if($str1 == "Reparto"){  ... replace by if($str1 == "Cast" ){ ...

With these simple changes you are already adapted the script for a new language. Literals are obtained directly from the source code FilmAffinity.

## How to run?
1. Download the script
2. Import it into your project PHP
3. Calls the function that fits your needs
