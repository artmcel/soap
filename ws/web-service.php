<?php

//comenzamos con una clase abstracta para heredarlo a todas las demas

abstract class WebService{

    //agregar datos
    public $SoapClientAdd;
    //consulta del ws
    public $SoapClientQuery;
	public $SoapClientQuerySua;


    public function __construct(){
        /**
         * url de testing de todos los proyectos..
         * esperamos la url de los ws
         */

        $url    = "http://187.188.111.155/TestingWSOperacionesUnificadas/OperacionesUnificadas.asmx?WSDL";
		$urlSua = "http://187.188.111.155/TestingWSOperacionesUnificadas/SideTrack.asmx?WSDL";

        //llamadas al soapClient
        $this->SoapClientQuery    = new SoapClient($url);
		$this->SoapClientQuerySua = new SoapClient($urlSua);
        $this->SoapClientAdd      = new SoapClient($url);

    }

}


/**
 * 
 * definimos las clases para cada plantel,
 * hay que esperar la definicion del formulario ya que podria ser solo una clase para todos los planteles
 * 
 */

class COMBOS extends WebService{

	public function getPlanteles(){

		try {
			
			$resultado = $this->SoapClientQuery->__soapCall("ObtenerCatalogoPlanteles", array(
				"ObtenerCatalogoPlanteles")
			);
			$d = $resultado->ObtenerCatalogoPlantelesResult->PlantelesDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

	public function getNiveles( $idPlantel ){

		try {
			
			$resultado = $this->SoapClientQuery->__soapCall("ObtenerCatalogoNivelEscolar", array(
				"ObtenerCatalogoNivelEscolar" => array(
					"clavePlantel" => $idPlantel)
			));
			$d = $resultado->ObtenerCatalogoNivelEscolarResult->NivelDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}
	
	public function getPeriodos( $idPlantel ){

		try {
			
			$resultado = $this->SoapClientQuery->__soapCall("ObtenerCatalogoPeriodoEscolar", array(
				"ObtenerCatalogoPeriodoEscolar" => array(
					"clavePlantel" => $idPlantel)
			));
			$d = $resultado->ObtenerCatalogoPeriodoEscolarResult->PeriodosDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

	public function getCarreras( $idNivel, $idPeriodo, $idPlantel ){

		try {
			
			$resultado = $this->SoapClientQuery->__soapCall("ObtenerCatalogoCarreras", array(

				"ObtenerCatalogoCarreras" => array(
					"claveNivel" => $idNivel,
					"clavePeriodo" => $idPeriodo,
					"clavePlantel" => $idPlantel
				)
			));
			$d = $resultado->ObtenerCatalogoCarrerasResult->CarerrasDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

	public function getCarrerasSua( $idModo, $idNivel, $idPeriodo, $idPlantel ){

		try {
			
			$resultado = $this->SoapClientQuerySua->__soapCall("ObtenerCatalogoCarreras", array(

				"ObtenerCatalogoCarreras" => array(
					"clavemodo" => $idModo,
					"claveNivel" => $idNivel,
					"clavePeriodo" => $idPeriodo,
					"clavePlantel" => $idPlantel
				)
			));
			$d = $resultado->ObtenerCatalogoCarrerasResult->CarerrasDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

	public function getHorarios( $idCarrera, $idNivel, $idPeriodo, $idPlantel ){

		try {
			
			$resultado = $this->SoapClientQuery->__soapCall("ObtenerCatalogoTurnos", array(
				"ObtenerCatalogoTurnos" => array(
					"claveCarrera" => $idCarrera,
					"claveNivel" => $idNivel,
					"clavePeriodo" => $idPeriodo,
					"clavePlantel" => $idPlantel
				)
			));
			$d = $resultado->ObtenerCatalogoTurnosResult->TurnosDTO;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

}

class AddProspecto extends WebService{

	public function addProspecto( $args = array() ){

		try {
			
			$resultado = $this->SoapClientAdd->__soapCall("AgregarProspectoCRM", array(
				"AgregarProspectoCRM" => array( $args )
			));

			$d = $resultado->AgregarProspectoCRMResult;
			return $d;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

}
			
			
/*

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
*/


?>