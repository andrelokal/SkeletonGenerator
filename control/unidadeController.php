      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $unidade = new Unidade();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($unidade->selectAll($offset,$rows) as $objUnidade){
                    
                        $arr = array("id" => $objUnidade->id,
                                 "descricao" => $objUnidade->descricao);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $unidade->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"descricao","title"=>"Descricao","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "get_all":
            
                $collection = array();
                foreach($unidade->selectAll() as $objUnidade){
                    
                        $arr = array("id" => $objUnidade->id,
                                 "text" => $objUnidade->descricao);
                    array_push($collection,$arr);
                }
                    
                print json_encode($collection);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $unidade->populationClass($_REQUEST);
                $return = $unidade->save();
                print json_encode(array("success" => $return,"errorMsg" => $unidade->getError()));
            break;
            
            
            case "delete":
                $unidade->populationClass($_REQUEST);
                $return = $unidade->delete();
                print json_encode(array("success" => $return,"errorMsg" => $unidade->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $unidade->populationClass($_REQUEST);
                $return = $unidade->save();
                print json_encode(array("success" => $return,"errorMsg" => $unidade->getError()));
            break;
            
        }
?>
        