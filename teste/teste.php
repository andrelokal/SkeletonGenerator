<?php
require_once("../util/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste</title>
		<link rel="stylesheet" type="text/css" href="<?= PATH."view/easyui/themes/default/easyui.css"?>">
        <link rel="stylesheet" type="text/css" href="<?= PATH."view/easyui/themes/bootstrap/easyui.css"?>">		
        <link rel="stylesheet" type="text/css" href="<?= PATH."view/easyui/themes/icon.css"?>">
        <link rel="stylesheet" type="text/css" href="<?= PATH."view/easyui/themes/color.css"?>">
        <link rel="stylesheet" type="text/css" href="<?= PATH."view/easyui/demo/demo.css"?>">
        <script type="text/javascript" src="<?= PATH."view/easyui/jquery.min.js"?>"></script>
        <script type="text/javascript" src="<?= PATH."view/easyui/jquery.easyui.min.js"?>"></script>
        <script type="text/javascript" src="<?= PATH."view/javaScript/index.js"?>"></script>
        <script type="text/javascript" src="<?= PATH."view/easyui/locale/easyui-lang-pt_BR.js"?>"></script>
		
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>



<form id="form1" name="form1" method="post" action="">

  <fieldset> 
  <legend>Preencha os dados abaixo:</legend> 
  
 <div class="linha"> 
  <label>Nome: <br /> 
  <input name="nome" type="text" id="nome" size="40" /> 
  </label> 
 </div> 
  
 <div class="linha2"> 
  <label> 
  Email: <br /> 
  <input name="email" type="text" id="email" size="40" /> 
  </label> 
 </div>

 <div class="linha"> 
  <label>Sexo: 
  <input name="masc" type="radio" value="masculino" />Masculino</label> 
  <label><input name="fem" type="radio" value="feminino" />Feminino</label> 
 </div>

 <div class="linha2"> 
  <label>Estado: 
  <select name="estado" id="estado"> 
  <option>SP</option> 
  <option>MG</option> 
  <option>RJ</option> 
  <option>ES</option> 
  </select> 
   </label> 
 </div> 
   
 <div class="linha"> 
  <label>Comentários: <br /> 
  <textarea name="comentarios" cols="30" rows="4" id="comentarios"></textarea> 
  </label> 
 </div> 
    
 <div class="linha"> 
  <label><input name="newsletter" type="checkbox" id="newsletter" value="sim" /> 
  Quero receber a newsletter deste site 
  </label> 
 </div> 
   
 <div class="linha2"> 
  <label><input name="Enviar" type="submit" id="Enviar" value="Enviar" /> 
  </label> 
 </div> 
  
  </fieldset>

</form> 
</body> 
</html>










<!--
            <input id="unidade_id" class="easyui-combobox" name="unidade_id" data-options="
                    valueField: 'id',
                    textField: 'descricao'
                    "> -->

</body>
        <script>
            /*$(function(){
                $('#unidade_id').combobox('reload', '../control/unidadeController.php?action=get_all');
            });*/
        </script>
</html>