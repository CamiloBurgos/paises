<?php
header('Access-Control-Allow-Origin: *');
	require_once '../modelos/entidadpaises.php';
	require_once '../modelos/modelopaises.php';
	require_once '../modelos/modelociudad.php';

	$modelp= new ModelPaises();

	if(isset($_REQUEST['Accion'])){
		switch($_REQUEST['Accion']){

		case 'listar':
				$jsondata=$modelp->listar();
				//var_dump($jsondata);
				header('Content-type: application/json; charset=utf-8');
				echo json_encode($jsondata);
				break;

        case 'obtener':
            $jsondata = $modelp->Obtener($_REQUEST['ccId']);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsondata);            
            break;		
		}		
  	}
	
	
		


?>