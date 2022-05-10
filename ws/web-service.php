<?php

//comenzamos con una clase abstracta para heredarlo a todas las demas

abstract class WebService{

    //agregar datos
    public $SoapClientAdd;
    //consulta del ws
    public $SoapClientQuery;


    public function __construct(){
        /**
         * url de testing de todos los proyectos..
         * esperamos la url de los ws
         */

        $url  = "http://187.188.111.155/TestingWSOperacionesUnificadas/OperacionesUnificadas.asmx?WSDL";
        //calculadora ocupa el de arriba para los planteles y 
        $urlC = "http://187.188.111.155/TestingWSOperacionesUnificadas/calculadoracuotas.asmx?WSDL";
        //test...->ocupa operaciones unificadas para el registro
        //preinscripcion...->ocupa operaciones unificadas y
        $urlP = "http://187.188.111.155/TestingWSOperacionesUnificadas/PreinscripcionEnLinea.asmx?WSDL";
        //nuevo ingreso... usa operaciones unificadas para consulta de planteles y:
        $urlN = "http://187.188.111.155/TestingWSOperacionesUnificadas/Propedeutico.asmx?WSDL";
        /**
         * estos tres son solo registro y solo retornan una respuesta
         * prospectacion...usa operaciones unificadas
         * dia unimex... operacionesUnificadas
         * proyeccion...operacionesUnificadas
         * 
         */

        //llamadas al soapClient
        $this->SoapClientQuery              = new SoapClient($url);
        $this->SoapClientAdd                = new SoapClient($url);
        /*
        $this->SoapClientQueryCalculadora   = new SoapClient($urlC);
        $this->SoapClientQueryPreinscipcion = new SoapClient($urlP);
        $this->SoapClientAddNuevoIngreso    = new SoapClient($urlN);
        */
    }

}


/**
 * 
 * definimos las clases para cada plantel,
 * hay que esperar la definicion del formulario ya que podria ser solo una clase para todos los planteles
 * 
 */

class IZCALlI  extends WebService{

    public function guardaProspectoIzcalli( $args = array() ){

        if( !isset($args) || strlen($args < 0) ) throw 'argumentos de nuevo ingreso login vacios';

		try {
			//code...
			$r = $this->SoapClientAdd->__soapCall("nombre del metodo del ws", array(
				"nombre del metodo del ws" => $args
			));
			$d = $r->"nombre del metodo del ws"Result->EntPrope;
			return $d;
		} catch (\Throwable $th) {
			throw $th;
		}
	}


}

class SATELITE  extends WebService{

    public function guardaProspectoSatelite( $args = array() ){

        if( !isset($args) || strlen($args < 0) ) throw 'argumentos de nuevo ingreso login vacios';

		try {
			//code...
			$r = $this->SoapClientAdd->__soapCall("nombre del metodo del ws", array(
				"nombre del metodo del ws" => $args
			));
			$d = $r->"nombre del metodo del ws"Result->EntPrope;
			return $d;
		} catch (\Throwable $th) {
			throw $th;
		}
	}
    
}

class POLANCO  extends WebService{

    public function guardaProspectoPolanco( $args = array() ){

        if( !isset($args) || strlen($args < 0) ) throw 'argumentos de nuevo ingreso login vacios';

		try {
			//code...
			$r = $this->SoapClientAdd->__soapCall("nombre del metodo del ws", array(
				"nombre del metodo del ws" => $args
			));
			$d = $r->"nombre del metodo del ws"Result->EntPrope;
			return $d;
		} catch (\Throwable $th) {
			throw $th;
		}
	}
    
}

class VERACRUZ  extends WebService{

    public function guardaProspectoVeracruz( $args = array() ){

        if( !isset($args) || strlen($args < 0) ) throw 'argumentos de nuevo ingreso login vacios';

		try {
			//code...
			$r = $this->SoapClientAdd->__soapCall("nombre del metodo del ws", array(
				"nombre del metodo del ws" => $args
			));
			$d = $r->"nombre del metodo del ws"Result->EntPrope;
			return $d;
		} catch (\Throwable $th) {
			throw $th;
		}
	}
    
}


?>