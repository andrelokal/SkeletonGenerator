      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $categoria = new Categoria();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($categoria->selectAll($offset,$rows) as $objCategoria){
                    
                        $arr = array("id" => $objCategoria->id,
                                 "nome" => $objCategoria->nome);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $categoria->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"nome","title"=>"Nome","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "get_all":
            
                $collection = array();
                foreach($categoria->selectAll() as $objCategoria){
                    
                        $arr = array("id" => $objCategoria->id,
                                 "text" => $objCategoria->nome);
                    array_push($collection,$arr);
                }
                    
                print json_encode($collection);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $categoria->populationClass($_REQUEST);
                $return = $categoria->save();
                print json_encode(array("success" => $return,"errorMsg" => $categoria->getError()));
            break;
            
            
            case "delete":
                $categoria->populationClass($_REQUEST);
                $return = $categoria->delete();
                print json_encode(array("success" => $return,"errorMsg" => $categoria->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $categoria->populationClass($_REQUEST);
                $return = $categoria->save();
                print json_encode(array("success" => $return,"errorMsg" => $categoria->getError()));
            break;
            
        }
?>
        