<?php
header('Access-Control-Allow-Origin: *');
	require_once '../modelos/modelociudad.php';
	require_once '../modelos/entidadciudad.php';

	$modelp= new ModelCiudad();

	if(isset($_REQUEST['Accion'])){
		switch($_REQUEST['Accion']){
			case 'listar':
					$jsondata=$modelp->Listar();
					header('Content-type: application/json; charset=utf-8');
					echo json_encode($jsondata);
					break;
		}		
  	}


?>