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
				$ciudad = new Ciudad();
					$ciudad->__SET('id', $r->ciudad_id);
					$ciudad->__SET('pais', $r->ciudad_pais);					
					$ciudad->__SET('nombre', $r->ciudad_nombre);
					$ciudad->__SET('gente', $r->ciudad_gente);
					
				$result[] = $ciudad->returnArray();
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
	/*public function obtener($id){
        $jsonresponse = array();
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ciudades where ciudad_id = ?");
                                		
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $pai = new Ciudades();
					$pai->__SET('cid', $r->ciudad_id);
					$pai->__SET('cpais', $r->ciudad_pais);					
					$pai->__SET('nciudad', $r->ciudad_nombre);
					$pai->__SET('gente', $r->ciudad_gente);

            $jsonresponse['success'] = true;
            $jsonresponse['message'] = 'Se obtuvo  correctamente';
            $jsonresponse['datos'] = $pai->returnArray();
        } catch (Exception $e){
   
            $jsonresponse['success'] = false;
            $jsonresponse['message'] = 'Error ';             
        }
        return $jsonresponse;
    }*/
}
?>
