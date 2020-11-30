<?php
/******************************************
*Completar:
* NOMBRE Y APELLIDOS - LEGAJOS
*Daiana Nahir Capua - FAI-3095
*Fernando Gutierrez Cruz - FAI-3082
*Cristian Riquelme - FAI-2744
******************************************/

/**
* genera un arreglo de palabras para jugar
* @return array
*/
function cargarPalabras(){
  $coleccionPalabras = array();
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=> 4);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabra"=> 6);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabra"=> 10);
  $coleccionPalabras[3]= array("palabra" => "starbucks" , "pista" => "compañia de cafe" , "puntosPalabra" => 12) ;
  $coleccionPalabras[4]= array("palabra" => "alcahuete" , "pista" => "alaba de forma exagerada con el fin de conseguir un beneficio", "puntosPalabra" => 15) ;
  $coleccionPalabras[5]= array("palabra" => "explorer" , "pista" => "el mejor explorador de internet" , "puntosPalabra" => 10) ;
  $coleccionPalabras[6]= array("palabra" => "pseudocodigo" , "pista" => "lenguaje para escribir de forma compacta e informal antes de programar. " , "puntosPalabra" => 22) ;
  
  return $coleccionPalabras;
}

/**
* Almacena la cantidad de puntos que obtuvo en cada juego
*/
function cargarJuegos(){
	$coleccionJuegos = array();
	$coleccionJuegos[0] = array("puntos"=> 0, "indicePalabra" => 1);
	$coleccionJuegos[1] = array("puntos"=> 10,"indicePalabra" => 2);
    $coleccionJuegos[2] = array("puntos"=> 0, "indicePalabra" => 1);
    $coleccionJuegos[3] = array("puntos"=> 4, "indicePalabra" => 0);
    $coleccionJuegos[4] = array("puntos" => 20, "indicePalabra" => 6) ;
    $coleccionJuegos[5] = array("puntos" => 0, "indicePalabra" => 3) ;
    $coleccionJuegos[6] = array("puntos" => 10, "indicePalabra" => 4 ) ;
    
    return $coleccionJuegos;
}

/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra
* @return array
*/
function dividirPalabraEnLetras($palabra){
    
    /*>>> Completar para generar la estructura de datos b) indicada en el enunciado. 
          recuerde que los string pueden ser recorridos como los arreglos.  <<<*/
    $n = strlen($palabra);              //strlen, obtiene la longitud de un string 
    for ($i = 0; $i < $n; $i++){
        $arregloPalabraDividida[$i] = array( "letra" => $palabra[$i] , "descubierta" => false );
    }
    return $arregloPalabraDividida;
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int
*/
function seleccionarOpcion(){
    //Int $opcion, $respuesta 

    echo "--------------------------------------------------------------\n";
    echo "\n Elija una opcion: \n" ;
    echo "\n ( 1 ) Jugar con una palabra aleatoria";
    echo "\n ( 2 ) Jugar con una palabra elegida";
    echo "\n ( 3 ) Agregar una palabra al listado";
    echo "\n ( 4 ) Mostrar la información completa de un número de juego";
    echo "\n ( 5 ) Mostrar la información completa del primer juego con más puntaje";
    echo "\n ( 6 ) Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario";
    echo "\n ( 7 ) Mostrar la lista de palabras ordenada por orden alfabetico ";
    echo "\n ( 8 ) Salir del juego \n " ;
    echo "--------------------------------------------------------------\n" ;
    echo "su opcion es: " ;
    $respuesta = trim(fgets((STDIN))) ;
    if ($respuesta <= 8 && $respuesta > 0) {
        $opcion = $respuesta ;
        return $opcion;
    } else{
        echo "Error, no ha selecionado una opcion valida \n " ;
    }
}

/**
* Determina si una palabra existe en el arreglo de palabras
* @param array $coleccionPalabras
* @param string $palabra
* @return boolean
*/
function existePalabra($coleccionPalabras,$palabra){
    $i=0;
    $cantPal = count($coleccionPalabras);
    $existe = false;
    while($i<$cantPal && !$existe){
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }
    
    return $existe;
}

/**
* Determina si una letra existe en el arreglo de letras
* @param array $coleccionLetras
* @param string $letra
* @return boolean
*/
function existeLetra( $coleccionLetras, $letra ){
    // int $i, $cantLetras
    // boolean $existeLetra
    $i=0; 
    $cantLetras = count($coleccionLetras);
    $existeLetra = false;
    while($i<$cantLetras && !$existeLetra){
        if($coleccionLetras[$i]["letra"] == $letra){
            $existeLetra = true;
        }
        $i++;
    }
    return $existeLetra;
}

/**
* Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje. 
* Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
* @param array $coleccionPalabras
* @return array  colección de palabras modificada con la nueva palabra.
*/
 
function agrandarColeccion ($coleccionPalabras){
    //bool $chequeo
    //string $nuevaPista,$palabraNueva
    //int $nuevoPuntaje
    echo "ingrese la nueva palabra: ";
    $palabraNueva = trim(fgets(STDIN));
    $chequeo = existePalabra($coleccionPalabras,$palabraNueva);
    if ($chequeo){
        echo "ERROR.. La palabra ya existe en la coleccion. \n";
    }else{
        $i = (count($coleccionPalabras) +1);
        echo "ingrese la pista de la nueva palabra: ";
        $nuevaPista = trim(fgets(STDIN));
        echo "ingrese el puntaje de la nueva palabra: ";
        $nuevoPuntaje = trim(fgets(STDIN));
        $nuevoIngreso [$i]= ["palabra" => $palabraNueva, "pista" => $nuevaPista, "puntosPalabras" => $nuevoPuntaje];
        $coleccionPalabras = array_merge($coleccionPalabras,$nuevoIngreso);     //array_merge, Combina dos o ms arrays
    }
    return $coleccionPalabras;
}
/**
* Obtener indice aleatorio
* @param int $min 
* @param int $max
* @return int
*/
function indiceAleatorioEntre($min,$max){
    $i = rand($min,$max);   /*la funcion rand ( $min, $max ) toma dos valores, el minimo, y el maximo, y retorna un valor aleatorio dentro de esos valores
    el valor minimo que va a tomar es el 0, y el maximo depende de cuantas palabras esten guardadas en $coleccionPalabras*/
    return $i;
}
/**
* solicitar un valor entre min y max
* @param int $min
* @param int $max
* @return int
*/
function solicitarIndiceEntre($min,$max){ 
    do{
        echo "Seleccione un valor entre $min y $max: ";
        $i = trim(fgets(STDIN));
    }while(!($i>=$min && $i<=$max));
    
    return $i;
}

/**
* Determinar si la palabra fue descubierta, es decir, TODAS las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean
*/
/**** chequear si sigue dando verdad con todas las letras ****/
function palabraDescubierta($coleccionLetras){
    // int $n, $contador
    // boolean $respuesta
    $n = count($coleccionLetras);
    $contador = 0;
    $respuesta = false;
    for( $i = 0; $i < $n; $i++){
        if ( $coleccionLetras[$i]["descubierta"] == true ){
            $contador++;
        }
        if ( $contador == $n){
            $respuesta = true;
        }
    } return $respuesta;
}

/**
* solicita una letra y verifica que sea un dato correctamente ingresado, si es asi retorna true, sino false
*/
function solicitarLetra(){
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN))); // strtolower, transforma un string a minuscula
        if(strlen($letra)!=1){ // strlen, cuenta la cantidad de caracteres que tiene un string
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}

/***** fijarse que siga destapando bien las letras *****/
/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
function destaparLetra($coleccionLetras, $letra){
    // int $n, $i
    $n = count($coleccionLetras);
    for ($i = 0; $i < $n; $i++){
        if ( $coleccionLetras[$i]["letra"] == $letra ){ // chequear esto, sino probar con existeLetra
            $coleccionLetras[$i]["descubierta"] = true;
        }
    }
    return $coleccionLetras;
}

/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    // int $n 
    // string $pal
    $pal = "";
    $n = count($coleccionLetras);
    for($i = 0 ; $i < $n ; $i++){
        if ($coleccionLetras[$i]["descubierta"]){
            $pal = $pal . $coleccionLetras[$i]["letra"];
        } else{
            $pal = $pal . "*";
        }
    }
    return $pal;
}

/**
* Desarrolla el juego y retorna el puntaje obtenido
* Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
* Si no descubre la palabra el puntaje es 0.
* @param array $coleccionPalabras
* @param int $indicePalabra
* @param int $cantIntentos
* @return int puntaje obtenido
*/
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos){
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $coleccionLetras = dividirPalabraEnLetras($pal);
    //print_r($coleccionLetras);
    // int $puntaje
    // string $pal, $revelando
    // boolean $palabraFueDescubierta, $respuesta
    $puntaje = 0;
    $palabraFueDescubierta = false;
    //Mostrar pista:
    echo "Pista: " . $coleccionPalabras[$indicePalabra]["pista"] . "\n";
    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    while ( $cantIntentos > 0 && !$palabraFueDescubierta){
        $letra = solicitarLetra();
        $respuesta = existeLetra ($coleccionLetras, $letra);
        if ( $respuesta == true ){
            echo "la letra " . $letra . " PERTENECE a la palabra. \n";
            $coleccionLetras = destaparLetra($coleccionLetras, $letra);
            $palabraFueDescubierta = palabraDescubierta($coleccionLetras);
        } else{
            $cantIntentos--;
            switch($cantIntentos){      //switch, similar al if
                case 5: 
                    echo "              +---+\n";
                    echo "              |   |\n";
                    echo "              0   |\n";
                    echo "                  |\n";
                    echo "                  |\n";
                    echo "                  |\n";
                    echo "=================================\n" ;
                    echo "la letra - " . $letra . " - NO pertenece a la palabra. Quedan " . $cantIntentos . " intentos. \n";
                break;          //break, finaliza la ejecucion de las estructuras
                case 4:
                    echo "              +---+\n";
                    echo "              |   |\n";
                    echo "              0   |\n";
                    echo "              |   |\n";
                    echo "                  |\n";
                    echo "                  |\n";
                    echo "=================================\n" ;
                    echo "la letra - " . $letra . " - NO pertenece a la palabra. Quedan " . $cantIntentos . " intentos. \n";
                break;
                case 3:
                    echo "              +---+\n";
                    echo "              |   |\n";
                    echo "              0   |\n";
                    echo "             /|   |\n";
                    echo "                  |\n";
                    echo "                  |\n";
                    echo "=================================\n" ;
                    echo "la letra - " . $letra . " - NO pertenece a la palabra. Quedan " . $cantIntentos . " intentos. \n";
                break;
                case 2:
                    echo "              +---+\n";
                    echo "              |   |\n";
                    echo "              0   |\n";
                    echo "             /|\  |\n";
                    echo "                  |\n";
                    echo "                  |\n";
                    echo "=================================\n" ;
                    echo "la letra - " . $letra . " - NO pertenece a la palabra. Quedan " . $cantIntentos . " intentos. \n";
                break;
                case 1:
                    echo "              +---+\n";
                    echo "              |   |\n";
                    echo "              0   |\n";
                    echo "             /|\  |\n";
                    echo "             /    |\n";
                    echo "                  |\n";
                    echo "=================================\n" ;
                    echo "la letra - " . $letra . " - NO pertenece a la palabra. Quedan " . $cantIntentos . " intentos. \n";
                break;
            }
            
        }
        $revelando = stringLetrasDescubiertas ($coleccionLetras);
        echo "Palabra a descubrir es: " . $revelando . "\n";
        echo "\n--------------------------------------------------------------\n" ;
    }
    if($palabraFueDescubierta){
        //obtener puntaje:
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] + $cantIntentos;
        echo "\n¡¡¡¡¡¡GANASTE " . $puntaje . " puntos!!!!!!\n";
    }else{
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
        echo "              +---+\n";
        echo "              |   |\n";
        echo "              0   |\n";
        echo "             /|\  |\n";
        echo "             / \  |\n";
        echo "                  |\n";
        echo "=================================\n" ; 
        echo "La palabra era: " . $pal ."\n";
    }
    return $puntaje;
}

/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $ptos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    $coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);    
    return $coleccionJuegos;
}

/**
 * realiza la opcion 1
 * @param array $coleccionPalabras
 * @param array $coleccionJuegos
 * @param int $cantIntentos
 */
function jugarAleatorio ($coleccionPalabras, $coleccionJuegos, $cantIntentos){
    //
    $n = count($coleccionPalabras) -1;
    $indice = indiceAleatorioEntre (0, $n);
    $puntaje = jugar ($coleccionPalabras, $indice, $cantIntentos);
    $coleccionJuegos = agregarJuego ( $coleccionJuegos, $puntaje, $indice);
    return ($coleccionJuegos);
}

/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    $palabraAImprimir = $coleccionPalabras[$indicePalabra];
    echo "Palabra: " . $coleccionPalabras[$indicePalabra]["palabra"] . "\n";
    echo "Pista: " . $coleccionPalabras[$indicePalabra]["pista"] . "\n";
    echo "Puntos de la palabra: " . $coleccionPalabras[$indicePalabra]["puntosPalabra"] . "\n";
}

/**
* Muestra los datos completos de un juego
* @param array $coleccionJuegos
* @param array $coleccionPalabras
* @param int $indiceJuego
*/
function mostrarJuego($coleccionJuegos,$coleccionPalabras,$indiceJuego){
    //array("puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego ".$indiceJuego." >->->\n";
    echo "Puntos ganados: ". $coleccionJuegos[$indiceJuego]["puntos"] . "\n";
    echo "Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/
/**
 * @param array $coleccionPalabras
 */
function ordenarPalabras ($coleccionPalabras){
    // array $palOrdenada
    asort($coleccionPalabras); // ordena el array alfabeticamente
    foreach ($coleccionPalabras as $i) { // recorre el array iterando sobre $i, de esta forma va imprimiendo cada elemento desde 0 hasta el ultimo.
        print_r($i); // imprime el array ordenado
    }
}

/**
 * realiza la opcion 4
 * @param array $coleccionPalabras
 * @param array $coleccionJuegos
 */
function elegirNroJuego($coleccionPalabras, $coleccionJuegos){
    $min = 0;
    $max = (count($coleccionJuegos))-1;
    echo "Elija el numero de juego. Entre ".$min." y ".$max.": ";
    $indiceJuego = trim(fgets(STDIN));
    if ( $min <= $indiceJuego && $indiceJuego <= $max){
        mostrarJuego($coleccionJuegos, $coleccionPalabras, $indiceJuego);
    } else {
        echo "Ingrese un numero dentro de los indices indicados. \n";
    }
    
}

/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/
/**
 * Mostrar la información completa del primer juego con más puntaje
 * @param array $coleccionJuegos
 * @return int // $indiceJuego
 */
function primerJuegoMayorPuntaje($coleccionJuegos){
    $j = count($coleccionJuegos);
    $mayorPuntaje = 0;
    $i = 0;
	do{
		$puntos = $coleccionJuegos[$i]["puntos"];
		if($puntos > $mayorPuntaje){
			$mayorPuntaje = $puntos;
			$indiceJuego = $i;
		}
		$i++;
    } while( !($i >= $j) );
    
    return ( $indiceJuego );
}

/**
 * realiza la opcion 5
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 */
function mejorJuego ( $coleccionJuegos, $coleccionPalabras ){
    $indice = primerJuegoMayorPuntaje($coleccionJuegos);
    mostrarJuego($coleccionJuegos, $coleccionPalabras,$indice); 
}

/** 
 * ingrese a que puntaje debe superar el juego, y retorna el indice de juego, o -1 si no hay uno que sea mejor
 * @param array $coleccionJuegos
 * @return int 
 */
function indiceMejorPuntajeIngresado($coleccionJuegos){
    // int $puntaje, $i, $n, $indice
    echo "ingrese el puntaje a superar: ";
    $puntaje = trim(fgets(STDIN));
    $i = 0;
    $n = count($coleccionJuegos);
    $indice = -1;
    while ( $i < $n && $indice == -1 ) {
        if ($coleccionJuegos[$i]["puntos"] > $puntaje) {
            $indice = $i;
        }
        $i++;
    } return $indice;
}

/**
 * realiza la opcion 6
 * usa dos funciones para mostrar por pantalla el primer juego mejor al puntaje ingresado
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 * @return
 */
function juegoMayorAlPuntaje ($coleccionJuegos, $coleccionPalabras){
    // int $indice
    $indice = indiceMejorPuntajeIngresado ($coleccionJuegos);
    if ($indice > -1){
        mostrarJuego($coleccionJuegos, $coleccionPalabras, $indice);
    } else{
        echo "No hay un juego con mejor puntaje al ingresado \n";
    }
}

/**
 * realiza la opcion 2, jugar eligiendo el indice de palabra
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 * @param int $cantIntentos
 * @return array
 */
function jugarEligiendoIndice ($coleccionJuegos, $coleccionPalabras, $cantIntentos){
    $i = 0;
    $j = count ($coleccionPalabras) - 1;
    $indicePalabra = solicitarIndiceEntre ($i, $j);
    $puntos = jugar($coleccionPalabras, $indicePalabra, $cantIntentos);
    $coleccionJuegos = agregarJuego($coleccionJuegos, $puntos, $indicePalabra);
    return $coleccionJuegos;
}


 


/* PROGRAMA PRINCIPAL */
$coleccionPalabras = cargarPalabras();
$coleccionJuegos = cargarJuegos();
define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.
do{
	$opcion=seleccionarOpcion();
	switch($opcion){
	case 1: //Jugar con una palabra aleatoria
        $coleccionJuegos = jugarAleatorio ($coleccionPalabras, $coleccionJuegos, CANT_INTENTOS);
		break;
	case 2: //Jugar con una palabra elegida
		$coleccionJuegos = jugarEligiendoIndice ($coleccionJuegos, $coleccionPalabras, CANT_INTENTOS);
		break;
	case 3: //Agregar una palabra al listado
		$coleccionPalabras = agrandarColeccion($coleccionPalabras);
		break;
	case 4: //Mostrar la información completa de un número de juego
		elegirNroJuego($coleccionPalabras, $coleccionJuegos);
		break;
	case 5: //Mostrar la información completa del primer juego con más puntaje	
		mejorJuego ( $coleccionJuegos, $coleccionPalabras );
		break;
	case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
        juegoMayorAlPuntaje ($coleccionJuegos, $coleccionPalabras);
		break;
	case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
		ordenarPalabras ($coleccionPalabras);
		break;
	}
}while($opcion != 8);

//Hola, soy Daiana