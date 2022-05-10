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
 * definimos las clases para cada plantel
 */

class IZCALlI  extends WebService{

}

class SATELITE  extends WebService{
    
}

class POLANCO  extends WebService{
    
}

class VERACRUZ  extends WebService{
    
}


?>