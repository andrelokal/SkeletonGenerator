      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $funcionario = new Funcionario();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($funcionario->selectAll($offset,$rows) as $objFuncionario){
                    
                        $arr = array("id" => $objFuncionario->id,
                                 "pessoa_id" => $objFuncionario->pessoa_id,
                                 "login" => $objFuncionario->login,
                                 "senha" => $objFuncionario->senha,
                                 "email" => $objFuncionario->email);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $funcionario->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"pessoa_id","title"=>"Pessoa_id","width"=>60, "align"=>"center"),
                array("field"=>"login","title"=>"Login","width"=>60, "align"=>"center"),
                array("field"=>"senha","title"=>"Senha","width"=>60, "align"=>"center"),
                array("field"=>"email","title"=>"Email","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $funcionario->populationClass($_REQUEST);
                $return = $funcionario->save();
                print json_encode(array("success" => $return,"errorMsg" => $funcionario->getError()));
            break;
            
            
            case "delete":
                $funcionario->populationClass($_REQUEST);
                $return = $funcionario->delete();
                print json_encode(array("success" => $return,"errorMsg" => $funcionario->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $funcionario->populationClass($_REQUEST);
                $return = $funcionario->save();
                print json_encode(array("success" => $return,"errorMsg" => $funcionario->getError()));
            break;
            
        }
?>
        