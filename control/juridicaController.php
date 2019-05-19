      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $juridica = new Juridica();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($juridica->selectAll($offset,$rows) as $objJuridica){
                    
                        $arr = array("id" => $objJuridica->id,
                                 "pessoa_id" => $objJuridica->pessoa_id,
                                 "cnpj" => $objJuridica->cnpj,
                                 "razao_social" => $objJuridica->razao_social,
                                 "nome_fantasia" => $objJuridica->nome_fantasia,
                                 "inscricao_estadual" => $objJuridica->inscricao_estadual,
                                 "ccm" => $objJuridica->ccm);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $juridica->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"pessoa_id","title"=>"Pessoa_id","width"=>60, "align"=>"center"),
                array("field"=>"cnpj","title"=>"Cnpj","width"=>60, "align"=>"center"),
                array("field"=>"razao_social","title"=>"Razao_social","width"=>60, "align"=>"center"),
                array("field"=>"nome_fantasia","title"=>"Nome_fantasia","width"=>60, "align"=>"center"),
                array("field"=>"inscricao_estadual","title"=>"Inscricao_estadual","width"=>60, "align"=>"center"),
                array("field"=>"ccm","title"=>"Ccm","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $juridica->populationClass($_REQUEST);
                $return = $juridica->save();
                print json_encode(array("success" => $return,"errorMsg" => $juridica->getError()));
            break;
            
            
            case "delete":
                $juridica->populationClass($_REQUEST);
                $return = $juridica->delete();
                print json_encode(array("success" => $return,"errorMsg" => $juridica->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $juridica->populationClass($_REQUEST);
                $return = $juridica->save();
                print json_encode(array("success" => $return,"errorMsg" => $juridica->getError()));
            break;
            
        }
?>
        