<?php
include("config.php");
include("ArquivosPadrao/DAO.php");

//$obj = new Produto();
//$obj = new Acesso();
//$obj = new Pessoa();
//$obj  = new Fisica();
//$obj = new Servico();

//$obj = new Servico();
//$obj = new ProdutoController();
//$obj = new ServicoController();
//$obj1  = new EntityGenerator('../data');
//$obj2  = new ViewGenerator('../View');
//$obj3  = new ControllerGenerator('../Control');
$obj1  = new ControllerGenerator2('../data');

echo "<pre>";

$result = $obj1->getTables();


foreach($result as $value){
            $obj1->generateByTable($value->Tables_in_mm_bd);
            //$obj2->generateByTable($value->Tables_in_dbteste);
            //$obj3->generateByTable($value->Tables_in_dbteste);
}






?>
