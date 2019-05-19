<?php
include("config.php");
include("ArquivosPadrao/DAO.php");

if(@file_exists ('../model/DAO.php'))
    die('arquivo ja executado');
 
mkdir('../model', 0777, true);
mkdir('../view', 0777, true);
mkdir('../control', 0777, true);
mkdir('../util', 0777, true);



//$obj = new Produto();
//$obj = new Acesso();
//$obj = new Pessoa();
//$obj  = new Fisica();
//$obj = new Servico();

//$obj = new Servico();
//$obj = new ProdutoController();
//$obj = new ServicoController();
$obj1  = new EntityGenerator('../Model');
$obj2  = new ViewGenerator('../View');
$obj3  = new ControllerGenerator('../Control');

echo "<pre>";

$result = $obj1->getTables();


foreach($result as $value){
            $obj1->generateByTable($value->Tables_in_dbteste);
            $obj2->generateByTable($value->Tables_in_dbteste);
            $obj3->generateByTable($value->Tables_in_dbteste);
}


if(is_array($result)){
    $obj1->doExecuteSQL("INSERT INTO modulo (text,pai,statusID,link) VALUES('Sistema',0,1,null)");
    $obj1->doExecuteSQL("INSERT INTO modulo (text,pai,statusID,link) VALUES('Configuracoes',0,1,null)");
    foreach($result as $value){
        if($value->Tables_in_dbteste == 'modulo'){
            $obj1->doExecuteSQL("INSERT INTO modulo (text,pai,statusID,link) VALUES('".ucfirst($value->Tables_in_dbteste)."',2,1,'".ucfirst($value->Tables_in_dbteste)."View.php')");    
        }else{
            $obj1->doExecuteSQL("INSERT INTO modulo (text,pai,statusID,link) VALUES('".ucfirst($value->Tables_in_dbteste)."',1,1,'".ucfirst($value->Tables_in_dbteste)."View.php')");    
        }
            
    }
       
}

copy('ArquivosPadrao/HomeView.php', '../View/HomeView.php');
copy('ArquivosPadrao/ModuloView.php', '../View/ModuloView.php');
copy('ArquivosPadrao/index.php', '../index.php');
copy('ArquivosPadrao/Modulo.php', '../model/Modulo.php');
copy('ArquivosPadrao/RecursiveClass.php', '../model/RecursiveClass.php');
copy('ArquivosPadrao/moduloController.php', '../control/moduloController.php');
copy('ArquivosPadrao/DAO.php', '../model/DAO.php');
copy('config.php', '../util/config.php');

//copiando diretorios 
copy_dir('ArquivosPadrao/bootstrap', '../View/bootstrap');
copy_dir('ArquivosPadrao/easyui', '../View/easyui');
copy_dir('ArquivosPadrao/javaScript', '../View/javaScript');



//$result = $obj->selectBycode('001');
//$result = $obj->getRecursiveList();
//$result = $obj->generateByTable('produto');
//$result = $obj->getConstraint('produto');
//$result = $obj->selectById(1)->getPessoa()->cidade;
//$result = $obj->selectAll(0,100);
//var_dump($obj);
//print_r($result);
//print_r($obj->data);
/*
if(is_array($result))
        echo "<br>array<br>";

//echo $result->COLUNA;
*/
//echo "<br> ok";


function copy_dir($origem, $dest){
  
      // copia o arquivo, caso nao seja pasta
      if (is_file($origem))
        return copy($origem, $dest);

      // cria o diretorio de destino caso ele nao exista
      if (!is_dir($dest)) 
        mkdir($dest);

      // verifica quais arquivos estao na pasta
      // e copia cada um deles
      $dir = dir($origem);
      while (false !== $entry = $dir->read()) {
        
        // corrige o bug dos diretorios vazios
        if ($entry == '.' || $entry == '..') 
          continue;
       
        // copia
        if ($dest !== "$origem/$entry") {
          // chama a funcao recursivamente
          copy_dir("$origem/$entry", "$dest/$entry");

          // altera as permissoes do diretorio
          chmod("$dest/$entry", 0777);
        }
      }

    $dir->close();
    return true;

}
?>
<body onload='window.location.href = "../../";'>