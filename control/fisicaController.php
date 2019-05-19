      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $fisica = new Fisica();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($fisica->selectAll($offset,$rows) as $objFisica){
                    
                        $arr = array("id" => $objFisica->id,
                                 "pessoa_id" => $objFisica->pessoa_id,
                                 "cpf" => $objFisica->cpf,
                                 "nome" => $objFisica->nome,
                                 "rg" => $objFisica->rg,
                                 "dt_nascimento" => $objFisica->dt_nascimento,
                                 "sexo" => $objFisica->sexo);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $fisica->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"pessoa_id","title"=>"Pessoa_id","width"=>60, "align"=>"center"),
                array("field"=>"cpf","title"=>"Cpf","width"=>60, "align"=>"center"),
                array("field"=>"nome","title"=>"Nome","width"=>60, "align"=>"center"),
                array("field"=>"rg","title"=>"Rg","width"=>60, "align"=>"center"),
                array("field"=>"dt_nascimento","title"=>"Dt_nascimento","width"=>60, "align"=>"center"),
                array("field"=>"sexo","title"=>"Sexo","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $fisica->populationClass($_REQUEST);
                $return = $fisica->save();
                print json_encode(array("success" => $return,"errorMsg" => $fisica->getError()));
            break;
            
            
            case "delete":
                $fisica->populationClass($_REQUEST);
                $return = $fisica->delete();
                print json_encode(array("success" => $return,"errorMsg" => $fisica->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $fisica->populationClass($_REQUEST);
                $return = $fisica->save();
                print json_encode(array("success" => $return,"errorMsg" => $fisica->getError()));
            break;
            
        }
?>
        