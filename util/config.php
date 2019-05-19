<?php
session_start();

//Configuração de Ambiente
ini_set('short_open_tag','1');

//variaveis do projeto
/*
$host      = "localhost:3306";
$user      = "root";
$pass      = "123";
$db        = "test";
*/
date_default_timezone_set('America/Sao_Paulo');


define("PATH_ROOT", @($_SERVER['DOCUMENT_ROOT']."/MARK1/"));
define("PATH", @($_SERVER['HTTP_REFERER']."/MARK1//"));
define("HOST", @($_SERVER['SERVER_ADDR']));



//autoload das classes
function __autoload($classe){
	if(!@include_once PATH_ROOT."model/".$classe.".php");
		if(!@include_once PATH_ROOT."util/".$classe.".php");
			if(!@include_once PATH_ROOT."control/".$classe.".php");
				if(!@include_once PATH_ROOT."engineer/".$classe.".php");
}

?>