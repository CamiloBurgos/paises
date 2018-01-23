<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../config/config.php';
class ModelPaises{

	private $pdo;

	public function __CONSTRUCT() {
		try{
			$this->pdo=new PDO('mysql:host='.HOST.';dbname='.DB,USERDB,PASSDB);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function listar(){
		$responsearray = array();
		try{
			$result = array();
			$stm=$this->pdo->prepare("SELECT * FROM paises, continente where continente_id=pais_categoria");
			$stm->execute();
			foreach($stm->fetchALL(PDO::FETCH_OBJ) as $r){
				$pai = new Paises();
					$pai->__SET('cc_id', $r->pais_id);
					$pai->__SET('cc_nombre', $r->pais_nombre);
					$pai->__SET('cc_descripcion', utf8_encode($r->pais_descripcion));
					$pai->__SET('cc_urlimagenp', $r->pais_gr);
					$pai->__SET('cc_urlimagens', $r->pais_ch);
					$pai->__SET('cc_categoria_id', $r->pais_categoria);
	                $pai->__SET('cc_categoria_nombre', $r->continente_nombre);
				$result[] = $pai->returnArray();
			}
			$responsearray['success']=true;
			$responsearray['message']='Listado correctamente';
			$responsearray['datos']=$result;

		}catch(Exception $e){
			echo $e;
			$responsearray['success']=false;
			$responsearray['message']='Error al listar cuerpocelnos';
		}
		return $responsearray;
	}
	public function Obtener($id){
        $jsonresponse = array();
        try{
            $stm = $this->pdo->prepare("SELECT * FROM paises, continente 
            							where continente_id=pais_categoria
                                		AND pais_id = ?");
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $pai = new Paises();
					$pai->__SET('cc_id', $r->pais_id);
					$pai->__SET('cc_nombre', $r->pais_nombre);
					$pai->__SET('cc_descripcion', utf8_encode($r->pais_descripcion));
					$pai->__SET('cc_urlimagenp', $r->pais_gr);
					$pai->__SET('cc_urlimagens', $r->pais_ch);
					$pai->__SET('cc_categoria_id', $r->pais_categoria);
	                $pai->__SET('cc_categoria_nombre', $r->continente_nombre);

            $jsonresponse['success'] = true;
            $jsonresponse['message'] = 'Se obtuvo  correctamente';
            $jsonresponse['datos'] = $pai->returnArray();
        } catch (Exception $e){
   
            $jsonresponse['success'] = false;
            $jsonresponse['message'] = 'Error ';             
        }
        return $jsonresponse;
    }
}
?>
