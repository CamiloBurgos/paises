<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../config/config.php';
class ModelCiudad{
	private $pdo;
	public function __CONSTRUCT() {
		try{
			$this->pdo=new PDO('mysql:host='.HOST.';dbname='.DB,USERDB,PASSDB);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		$responsearray = array();
		try{
			$result = array();
			$stm=$this->pdo->prepare("SELECT * FROM ciudades");
			$stm->execute();
			foreach($stm->fetchALL(PDO::FETCH_OBJ) as $r){
				$ciu = new Ciudad();
					$ciu->__SET('id', $r->ciudad_id);
					$ciu->__SET('pais', $r->ciudad_pais);					
					$ciu->__SET('nombre', $r->ciudad_nombre);
					$ciu->__SET('gente', $r->ciudad_gente);
					
				$result[] = $ciu->returnArray();
			}
			$responsearray['success']=true;
			$responsearray['message']='Listado correctamente';
			$responsearray['datos']=$result;

		}catch(Exception $e){
			echo $e;
			$responsearray['success']=false;
			$responsearray['message']='Error al listar ';
		}
		return $responsearray;
	}
	
}
?>
