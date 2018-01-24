<?php
header('Access-Control-Allow-Origin: *');
	require_once '../modelos/modelociudad.php';
	
		
	$modelp= new ModelCiudad();

	if(isset($_REQUEST['Accion'])){
		switch($_REQUEST['Accion']){
			
			case 'listar':
			
					$jsondata=$modelp->Listar();
					header('Content-type: application/json; charset=utf-8');
					echo json_encode($jsondata);
					break;

        case 'obtener':
					$jsondata = $modelp->obtener($_REQUEST['cid']);
					header('Content-type: application/json; charset=utf-8');
					echo json_encode($jsondata);            
					break;		
		}		
  	}


?>