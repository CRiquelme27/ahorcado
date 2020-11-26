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
  $coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabras"=> 4);
  $coleccionPalabras[1]= array("palabra"=> "hepatitis" , "pista" => "enfermedad que inflama el higado", "puntosPalabras"=> 6);
  $coleccionPalabras[2]= array("palabra"=> "volkswagen" , "pista" => "marca de vehiculo", "puntosPalabras"=> 10);
  $coleccionPalabras[3]= array("palabra" => "starbucks" , "pista" => "compañia de cafe" , "puntosPalabras" => 12) ;
  $coleccionPalabras[4]= array("palabra" => "alcahuete" , "pista" => "Alaba de forma exagerada con el fin de conseguir un beneficio", "puntosPalabras" => 14) ;
  $coleccionPalabras[5]= array("palabra" => "explorer" , "pista" => "el mejor explorador de internet" , "puntosPalabras" => 10) ;
  $coleccionPalabras[6]= array("palabra" => "pseudocodigo" , "pista" => "lenguaje para escribir un codigo antes de programar " , "puntosPalabras" => 20) ;
  
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
    $coleccionJuegos[6] = array("puntos" => 10, "indicePalabra" => 10 ) ;
    
    return $coleccionJuegos;
}
/**
* a partir de la palabra genera un arreglo para determinar si sus letras fueron o no descubiertas
* @param string $palabra // probando github
* @return array //nuevaprueba
*/
function dividirPalabraEnLetras($palabra){
    $palabraDividida = str_split($palabra) ;
    
    return $palabraDividida ;
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
    echo "\n ( 7 ) Mostrar la lista de palabras ordenada por orden alfabetico \n\n";
    echo "\n ( 8 ) Salir del juego \n " ;
    echo "--------------------------------------------------------------\n" ;
    echo "su opcion es: " ;
    $respuesta = trim(fgets((STDIN))) ;
    if ($respuesta <= 8 && $respuesta > 0) {
        $opcion = $respuesta ;
    } else{
        echo "Error, no ha selecionado una opcion valida \n " ;
    }
    return $opcion;
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
function existeLetra($coleccionLetras, $letra){
    $i=0;
    $cantLetras = count($coleccionLetras);
    $existeLetras = false;
    while($i < $cantLetras && !$existeLetras){
        $existeLetras = $coleccionLetras[$i] == $letra ;
        $i++;
    }
    return $existeLetras;
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
        echo "ERROR.. La palabra ya existe en la coleccion..";
    }else{
        $i = (count($coleccionPalabras) +1);
        echo "ingrese la pista de la nueva palabra";
        $nuevaPista = trim(fgets(STDIN));
        echo "ingrese el puntaje de la nueva palabra";
        $nuevoPuntaje = trim(fgets(STDIN));
        $nuevoIngreso [$i]= ["palabra" => $palabraNueva, "pista" => $nuevaPista, "puntosPalabras" => $nuevoPuntaje];
        $coleccionPalabras = array_merge($coleccionPalabras,$nuevoIngreso);
    };
    return $coleccionPalabras;
}
/**
* Obtener indice aleatorio
* @param int $min 
* @param int $max
* @return int
*/
function indiceAleatorioEntre($min,$max){
    $i = rand($min,$max);   //La funsion rand genera un numero entero alatorio, mostrando el numero minimo al maximo
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
* Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
* @param array $coleccionLetras
* @return boolean
*/
//function palabraDescubierta($coleccionLetras){
    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    // int $n, $contador, $i 

    //$n = count($coleccionLetras); // contador de letras
  //  $contador = 0; // contador de valores true
    //$respuesta = false; // variable bandera
    //for( $i = 0; $i < $n; $i++){
        //if ( $coleccionLetras[$i]["descubierta"] == true ){
            //$contador++;
        //};
        //if ( $contador == $n){
            //$respuesta = true;
        //}
    //} return $respuesta;
//}
function palabraDescubierta($coleccionLetras){
	//str $letra 
	//int $i
	$i=0;
	foreach($coleccionLetras as $letra){
		if($letra=="*"){
			$i++;
		}
	}
	if($i!=0){
		return false;
	}else{
	return true;
	}
}
/**
 * La funcion solicita una letra y revisa que el dato ingresado cumpla con las condiciones de que una sola letra este en minusculas y sea una , sino da aviso
 * @return string 
 */
function solicitarLetra(){
    $letraCorrecta = false;
    do{
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN)));    //La funcion strtolower convierte un string en minuscula
        if(strlen($letra)!=1){                      //La funcion obtiene la logitud de un string
            echo "Debe ingresar 1 letra!\n";
        }else{
            $letraCorrecta = true;
        }
        
    }while(!$letraCorrecta);
    
    return $letra;
}
/**
* Descubre todas las letras de la colección de letras iguales a la letra ingresada.
* Devuelve la coleccionLetras modificada, con las letras descubiertas
* @param array $coleccionLetras
* @param string $letra
* @return array colección de letras modificada.
*/
//function destaparLetra($coleccionLetras, $letra){
    
    //$n = count ($coleccionLetras);
    //$i = 0;
    //while ($i < $n){
        //if ($letra == $coleccionLetras[$i]['letra']){
            //$coleccionLetras[$i]['letra'] = $letra;
        //}else{
            //$coleccionLetras[$i]['letra'] = "*";
        //}
        //$i++;
    //}
    //return $coleccionLetras;
//}
function destaparLetra($coleccionLetras, $letra){
	//int $i
	//string $destapar, $caracter
	$destapar=[];
	$i=0;
	//$cantLet=count($coleccionLetras);
	foreach($coleccionLetras as $caracter){
		if ($caracter==$letra){
			$destapar[$i]=$letra; //Si la letra ingresada coinside con una del array se le asigna la misma
		}else{
			$destapar[$i]="*"; //Si la letra ingresada no coinside con una del array se le asigna "*"
		}
		$i++;
	}
	return $destapar;
}
/**
* obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
* @param array $coleccionLetras
* @return string  Ejemplo: "he**t*t*s"
*/
function stringLetrasDescubiertas($coleccionLetras){
    $pal = "";//variable bandera
    $pal = implode($coleccionLetras["letra"]);
    
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
function jugar($coleccionPalabras,$indicePalabra, $cantIntentos){
	//int $puntos, RpuntosPalabra, $i, $j
	//str $palabra, pista, $letra, $destapar
    //array $coleccionLetras
    
	$palabra = $coleccionPalabras[$indicePalabra]['palabra'];
	$pista = $coleccionPalabras[$indicePalabra]['pista'];
	$puntosPalabras = $coleccionPalabras[$indicePalabra]['puntosPalabras'];
	$coleccionLetras = dividirPalabraEnLetras($palabra);
	$puntos = 0;
    $contadorDeIntentos = 6;
    $i = 0;
    $j = strlen($palabra);
    
	echo ("Pista: $pista \n");
    echo ("------------------------------------------ \n");
    
	do{
	$letra = solicitarLetra();
		$existeLetra = existeLetra($coleccionLetras, $letra);
		$destapar = destaparLetra($coleccionLetras, $letra);
		$descubierta = palabraDescubierta($destapar);
		if($existeLetra == true){
			echo("\nLa letra '$letra' pertenece a la palabra \n");
			$i++;
		}else{
			echo("\nLa letra '$letra' no pertenece a la palabra\n");
			$cantIntentos--;
			$i++;
		}
	}while($cantIntentos > 0 || $descubierta == true);
	if($descubierta){
    //Obtener puntos:
    
		echo "\n¡¡¡¡¡¡GANASTE ".$puntos." puntos!!!!!!\n";
	}else{
		echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
	}

	return $puntos;
}
/**
* Agrega un nuevo juego al arreglo de juegos
* @param array $coleccionJuegos
* @param int $ptos
* @param int $indicePalabra
* @return array coleccion de juegos modificada
*/
function agregarJuego($coleccionJuegos,$puntos,$indicePalabra){
    //$coleccionJuegos[] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);
    $contadorJuegos = count($coleccionJuegos);
    $n = count($coleccionJuegos) + 1;
    while ($contadorJuegos < $n){
        $coleccionJuegos[$contadorJuegos] = array("puntos"=> $puntos, "indicePalabra" => $indicePalabra);
        $contadorJuegos++;
    } return $coleccionJuegos;
}
/**
* Muestra los datos completos de un registro en la colección de palabras
* @param array $coleccionPalabras
* @param int $indicePalabra
*/
function mostrarPalabra($coleccionPalabras,$indicePalabra){
    //$coleccionPalabras[0]= array("palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);
    
    $palabraAImprimir = $coleccionPalabras[$indicePalabra];
    print_r($palabraAImprimir);
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
    echo "  Puntos ganados: ".$coleccionJuegos[$indiceJuego]["puntos"]."\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras,$coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}


$coleccionPalabras=cargarPalabras();
$coleccionJuegos=cargarJuegos();
$cantIntentos=6; //cantidad de intentos que tendrá el jugador para adivinar la palabra.
$i=0;
$j=count($coleccionPalabras)-1;
do{
	$opcion=seleccionarOpcion();
	switch($opcion){
	case 1: //Jugar con una palabra aleatoria
                $indicePalabra=indiceAleatorioEntre($i, $j);
		$puntos=jugar($coleccionPalabras,$indicePalabra, $cantIntentos);
		break;
	case 2: //Jugar con una palabra elegida
		$indicePalabra=solicitarIndiceEntre($i, $j);
		$puntos=jugar($coleccionPalabras,$indicePalabra, $cantIntentos);
		break;
	case 3: //Agregar una palabra al listado
		$coleccionPalabras = agrandarColeccion($coleccionPalabras);
		break;
	case 4: //Mostrar la información completa de un número de juego
		echo("Ingrese un indice entre [$i-$j]: ");
                $indiceJuego=trim(fgets(STDIN));
		mostrarJuego($coleccionJuegos, $coleccionPalabras, $indiceJuego);
		break;
	case 5: //Mostrar la información completa del primer juego con más puntaje	
		$j=count($coleccionJuegos);
		$max=0;
		do{
			$puntos=$coleccionJuegos[$i]['puntos'];
			if($puntos>=$max){
				$max=$puntos;
				$indiceJuego=$i;
			}
			$i++;
		}while(!($i>=$j));
                mostrarJuego($coleccionJuegos, $coleccionPalabras, $indiceJuego);
		break;
	case 6: //Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario
		echo("Ingrese un puntaje maximo: ");
		$max=trim(fgets(STDIN));
		do{
			$puntos=$coleccionJuegos[$i]['puntos'];
			if($puntos>$max){
				$indiceJuego=$i;
			}
			$i++;
		}while(!($puntos>$max));
		mostrarJuego($coleccionJuegos, $coleccionPalabras, $indiceJuego);
		break;
	case 7: //Mostrar la lista de palabras ordenada por orden alfabetico
		$orden=[];
		for($i=0;$i<$j;$i++){
			$orden[$i]=$coleccionPalabras[$i]['palabra'];
		}
		sort($orden); //Ordena un array
		$i=0;
		foreach($orden as $palabra){
			echo("($i) $palabra \n");
			$i++;
		}
		break;
	}
}while($opcion != 8);