<?php 
 class Acesso extends DAO{ 
 
	private $table = "acesso";
	private $idName = "id"; 
	private $id;
	private $modulo_id; 
	private $funcionario_id; 
	private $nivel_acesso; 
	private $modulo; 
	private $funcionario; 
	private $servico; 

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

	 	foreach ($collectionThis as $obj){
	 	 	$objModulo = new Modulo();
	 	 	$obj->modulo = $objModulo->selectById($obj->modulo_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objFuncionario = new Funcionario();
	 	 	$obj->funcionario = $objFuncionario->selectById($obj->funcionario_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objServico = new Servico();
	 	 	$obj->servico = $objServico->selectById($obj->servico_id);
	 	}
	 	return $collectionThis;
	}
 
	public function select($where){
	 	$collectionThis = parent::doFind($this,$where);

	 	foreach ($collectionThis as $obj){
	 	 	$objModulo = new Modulo();
	 	 	$obj->modulo = $objModulo->selectById($obj->modulo_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objFuncionario = new Funcionario();
	 	 	$obj->funcionario = $objFuncionario->selectById($obj->funcionario_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objServico = new Servico();
	 	 	$obj->servico = $objServico->selectById($obj->servico_id);
	 	}
	 	return $collectionThis;
	}
 
	public function selectById($id){
	 	$this->id = $id;
	 	$objthis = parent::doFind($this);

	 	 $objModulo = new Modulo();
	 	 $objthis->modulo = $objModulo->selectById($objthis->modulo_id);
	 	 $objFuncionario = new Funcionario();
	 	 $objthis->funcionario = $objFuncionario->selectById($objthis->funcionario_id);
	 	 $objServico = new Servico();
	 	 $objthis->servico = $objServico->selectById($objthis->servico_id);
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