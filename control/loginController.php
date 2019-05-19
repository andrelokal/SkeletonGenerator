      
<?php
        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $objFunc = new Funcionario();

        switch($action){
            case "login":

                $login = preg_replace('/[^[:alnum:]_]/', '',$_REQUEST["login"]);
                $senha = preg_replace('/[^[:alnum:]_]/', '',$_REQUEST["senha"]);
                
                $usuario = $objFunc->select("where login = '{$login}' and senha = '{$senha}'");
                
                if(@$usuario[0]->id){
                    echo "<pre>";
                    print_r($usuario);  
                }else{
                    echo "login não encontrado";    
                }
                

                
                
            break;
            case 'logoff':
            break;
            case 'validateSession':
            break;
            
            
        }
?>       