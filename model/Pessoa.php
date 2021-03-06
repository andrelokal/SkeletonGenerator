<?php 
 class Pessoa extends DAO{ 
 
	private $table = "pessoa";
	private $idName = "id"; 
	private $id;
	private $status; 
	private $tipo; 
	private $rua; 
	private $numero; 
	private $bairro; 
	private $cidade; 
	private $uf; 
	private $cep; 
	private $pais; 
	private $telefone; 
	private $email; 
	private $dt_atualizacao; 
	private $dt_cadastro; 

 	public function __construct($id = ""){
 
	 	if($id)
	 	 	return $this->selectById($id);
	}
 
	#setters, getters, isset, unset magicos
	public function __set($pname, $pvalue) { $this->$pname = $pvalue; }
	public function __get($pname) { return $this->$pname; }
	public function __isset($pname) { return isset($this->$pname); }
	public function __unset($pname) { unset($this->$pname); }
 
 
	public function selectAll($offset,$rows){
	 	$this->id = "";
	 	$collectionThis = parent::doFind($this, "limit ".$offset.",".$rows."");
	 	return $collectionThis;
	}
 
	public function select($where){
	 	$collectionThis = parent::doFind($this,$where);
	 	return $collectionThis;
	}
 
	public function selectById($id){
	 	$this->id = $id;
	 	$objthis = parent::doFind($this);
	 	return $objthis;
	}
 
	public function save(){
	 	$result = parent::doSave($this);
	 	return $this;
	}
 
	public function delete(){
	 	if($this->id > 0){
	 	 	$result = parent::doDelete($this);
	 	 	return $result;
	 	}else{
	 	 	return false;
	 	}
	}
 
	public function populationClass($arrDados){
	 	parent::doPopulationClass($this,$arrDados);
	}
 

}
 ?>