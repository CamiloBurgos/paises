<?php
class Ciudad{
	private $id;
	private $pais;
	private $nombre;
	private $gente;
	
	public function __GET ($k){
		return $this->$k;
	}
	public function __SET($k,$v){
		$this->$k=$v;
	}
	public function returnArray(){
		return get_object_vars($this);
	}
}
?>