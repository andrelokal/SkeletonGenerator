<?php 
 class Entrada_produto extends DAO{ 
 
	private $table = "entrada_produto";
	private $idName = "id"; 
	private $id;
	private $produto_id; 
	private $fornecedor_id; 
	private $quantidade; 
	private $lote; 
	private $dt_compra; 
	private $dt_validade; 
	private $valor_unitario; 
	private $valor_total; 
	private $produto; 
	private $pessoa; 

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
	 	 	$objProduto = new Produto();
	 	 	$obj->produto = $objProduto->selectById($obj->produto_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objPessoa = new Pessoa();
	 	 	$obj->pessoa = $objPessoa->selectById($obj->fornecedor_id);
	 	}
	 	return $collectionThis;
	}
 
	public function select($where){
	 	$collectionThis = parent::doFind($this,$where);

	 	foreach ($collectionThis as $obj){
	 	 	$objProduto = new Produto();
	 	 	$obj->produto = $objProduto->selectById($obj->produto_id);
	 	}
	 	foreach ($collectionThis as $obj){
	 	 	$objPessoa = new Pessoa();
	 	 	$obj->pessoa = $objPessoa->selectById($obj->fornecedor_id);
	 	}
	 	return $collectionThis;
	}
 
	public function selectById($id){
	 	$this->id = $id;
	 	$objthis = parent::doFind($this);

	 	 $objProduto = new Produto();
	 	 $objthis->produto = $objProduto->selectById($objthis->produto_id);
	 	 $objPessoa = new Pessoa();
	 	 $objthis->pessoa = $objPessoa->selectById($objthis->fornecedor_id);
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