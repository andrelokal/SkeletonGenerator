      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $itens_venda = new Itens_venda();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($itens_venda->selectAll($offset,$rows) as $objItens_venda){
                    
                        $arr = array("id" => $objItens_venda->id,
                                 "venda_id" => $objItens_venda->venda_id,
                                 "produto_id" => $objItens_venda->produto_id,
                                 "quantidade" => $objItens_venda->quantidade,
                                 "valor_unitario" => $objItens_venda->valor_unitario);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $itens_venda->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"venda_id","title"=>"Venda_id","width"=>60, "align"=>"center"),
                array("field"=>"produto_id","title"=>"Produto_id","width"=>60, "align"=>"center"),
                array("field"=>"quantidade","title"=>"Quantidade","width"=>60, "align"=>"center"),
                array("field"=>"valor_unitario","title"=>"Valor_unitario","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $itens_venda->populationClass($_REQUEST);
                $return = $itens_venda->save();
                print json_encode(array("success" => $return,"errorMsg" => $itens_venda->getError()));
            break;
            
            
            case "delete":
                $itens_venda->populationClass($_REQUEST);
                $return = $itens_venda->delete();
                print json_encode(array("success" => $return,"errorMsg" => $itens_venda->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $itens_venda->populationClass($_REQUEST);
                $return = $itens_venda->save();
                print json_encode(array("success" => $return,"errorMsg" => $itens_venda->getError()));
            break;
            
        }
?>
        