<?php
/**
 * 
 * archivo para recibir los datos y enviarlos al ws
 * 
 */
/**
 * headers
 */
/*
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Origin: *');
*/
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

/**
 * request url
 */

$url = $_GET['obtener'];
$idPlantel = $_GET['idPlantel'];
$idNivel = $_GET['idNivel'];
$idPeriodo = $_GET['idPeriodo'];
$idCarrera = $_GET['idCarrera'];
$idModo = $_GET['idModo'];

/*

$idPlantel = 2;
$idNivel= 1;
$idPeriodo = 101;
$idCarrera = 1;
$modalidad = '';

*/

$obtenerPlanteles = function(){
    
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getPlanteles();
    echo json_encode($resultado);
};


$obtenerNiveles = function($idP){
        
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getNiveles($idP);
    echo json_encode($resultado);

};

$obtenerPeriodos = function($idP){
        
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getPeriodos($idP);
    echo json_encode($resultado);

};

$obtenerCarreras = function( $idNi, $idPe, $idPl ){
        
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getCarreras( $idNi, $idPe, $idPl );
    echo json_encode($resultado);

};

$obtenerCarrerasSua = function( $idMo, $idNi, $idPe, $idPl ){
        
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getCarrerasSua( $idMo, $idNi, $idPe, $idPl );
    echo json_encode($resultado);
};

$obtenerHorarios = function( $idCa, $idNi, $idPe, $idPl ){
        
    require('../ws/web-service.php');
    $ws = new COMBOS();
    $resultado = $ws->getHorarios( $idCa, $idNi, $idPe, $idPl );
    echo json_encode($resultado);

};


$guardaDatos = function( $args= array() ){
   
    require('../ws/web-service.php');
    $ws = new AddProspecto();
    $resultado = $ws->agregaProspecto( $args );
    echo json_encode($resultado);

};


//$obtenerNivel($idPlantel);
//$obtenerPeriodo($idPlantel);
//$obtenerCarreras($idNivel, $idPeriodo, $idPlantel);
//$obtenerHorarios($idCarrera, $idNivel, $idPeriodo, $idPlantel);

if( $url == "planteles" ){
    $obtenerPlanteles();   
}

if( $url == "niveles" ){
    $obtenerNiveles($idPlantel);
};

if( $url == "periodos" ){
    $obtenerPeriodos($idPlantel);
};

if( $url == "carreras" ){
    $obtenerCarrerasSua( $idModo, $idNivel, $idPeriodo, $idPlantel);
};

if( $url == "horarios" ){
    $obtenerHorarios($idCarrera, $idNivel, $idPeriodo, $idPlantel);
};

if( $url == "guardaDatos" ){
    
    $recibeJson = json_decode(file_get_contents('php://input'), false);
    //echo json_encode($args);
    $datos = (array)$recibeJson;

    $args = array(

        'campaignContent'=> $datos['utm_content'],
        'campaignMedium'=> $datos['utm_medium'],
        'campaignTerm'=> $datos['utm_id'],
        'descripPublicidad'=> $datos['utm_campaign'],
        'folioReferido'=> '0',               
        'pApMaterno' => $datos['amaterno'],
        'pApPaterno' => $datos['apaterno'],
        'pCarrera' => $datos['carrera'],
        'pCelular' => $datos['celular'],
        'pCorreo' => $datos['email'],
        'pHorario' => $datos['horario'],
        'pNivel_Estudio' => $datos['nivel'],
	    'pNombre' => $datos['nombre'],
        'pOrigen' => '13',
        'pPeriodoEscolar' => $datos['periodo'],
        'pPlantel' => $datos['plantel'],
        'pTelefono' => $datos['telefono'],
        'utpsource'=> $datos['utm_source'],
        'websiteURL'=> null,
    );

    //print_r($args);
    $guardaDatos($args);

}













?>