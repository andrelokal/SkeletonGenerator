      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $pessoa = new Pessoa();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($pessoa->selectAll($offset,$rows) as $objPessoa){
                    
                        $arr = array("id" => $objPessoa->id,
                                 "status" => $objPessoa->status,
                                 "tipo" => $objPessoa->tipo,
                                 "rua" => $objPessoa->rua,
                                 "numero" => $objPessoa->numero,
                                 "bairro" => $objPessoa->bairro,
                                 "cidade" => $objPessoa->cidade,
                                 "uf" => $objPessoa->uf,
                                 "cep" => $objPessoa->cep,
                                 "pais" => $objPessoa->pais,
                                 "telefone" => $objPessoa->telefone,
                                 "email" => $objPessoa->email,
                                 "dt_atualizacao" => $objPessoa->dt_atualizacao,
                                 "dt_cadastro" => $objPessoa->dt_cadastro);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $pessoa->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"status","title"=>"Status","width"=>60, "align"=>"center"),
                array("field"=>"tipo","title"=>"Tipo","width"=>60, "align"=>"center"),
                array("field"=>"rua","title"=>"Rua","width"=>60, "align"=>"center"),
                array("field"=>"numero","title"=>"Numero","width"=>60, "align"=>"center"),
                array("field"=>"bairro","title"=>"Bairro","width"=>60, "align"=>"center"),
                array("field"=>"cidade","title"=>"Cidade","width"=>60, "align"=>"center"),
                array("field"=>"uf","title"=>"Uf","width"=>60, "align"=>"center"),
                array("field"=>"cep","title"=>"Cep","width"=>60, "align"=>"center"),
                array("field"=>"pais","title"=>"Pais","width"=>60, "align"=>"center"),
                array("field"=>"telefone","title"=>"Telefone","width"=>60, "align"=>"center"),
                array("field"=>"email","title"=>"Email","width"=>60, "align"=>"center"),
                array("field"=>"dt_atualizacao","title"=>"Dt_atualizacao","width"=>60, "align"=>"center"),
                array("field"=>"dt_cadastro","title"=>"Dt_cadastro","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $pessoa->populationClass($_REQUEST);
                $return = $pessoa->save();
                print json_encode(array("success" => $return,"errorMsg" => $pessoa->getError()));
            break;
            
            
            case "delete":
                $pessoa->populationClass($_REQUEST);
                $return = $pessoa->delete();
                print json_encode(array("success" => $return,"errorMsg" => $pessoa->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $pessoa->populationClass($_REQUEST);
                $return = $pessoa->save();
                print json_encode(array("success" => $return,"errorMsg" => $pessoa->getError()));
            break;
            
        }
?>
        