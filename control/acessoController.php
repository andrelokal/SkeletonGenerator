      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $acesso = new Acesso();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($acesso->selectAll($offset,$rows) as $objAcesso){
                    
                        $arr = array("id" => $objAcesso->id,
                                 "modulo_id" => $objAcesso->modulo_id,
                                 "funcionario_id" => $objAcesso->funcionario_id,
                                 "nivel_acesso" => $objAcesso->nivel_acesso);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $acesso->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"modulo_id","title"=>"Modulo_id","width"=>60, "align"=>"center"),
                array("field"=>"funcionario_id","title"=>"Funcionario_id","width"=>60, "align"=>"center"),
                array("field"=>"nivel_acesso","title"=>"Nivel_acesso","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $acesso->populationClass($_REQUEST);
                $return = $acesso->save();
                print json_encode(array("success" => $return,"errorMsg" => $acesso->getError()));
            break;
            
            
            case "delete":
                $acesso->populationClass($_REQUEST);
                $return = $acesso->delete();
                print json_encode(array("success" => $return,"errorMsg" => $acesso->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $acesso->populationClass($_REQUEST);
                $return = $acesso->save();
                print json_encode(array("success" => $return,"errorMsg" => $acesso->getError()));
            break;
            
        }
?>
        