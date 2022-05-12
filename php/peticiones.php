<?php
/**
 * 
 * archivo para recibir los datos y enviarlos al ws
 * 
 */

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













?>