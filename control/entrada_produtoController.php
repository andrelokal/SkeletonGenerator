      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $entrada_produto = new Entrada_produto();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($entrada_produto->selectAll($offset,$rows) as $objEntrada_produto){
                    
                        $arr = array("id" => $objEntrada_produto->id,
                                 "produto_id" => $objEntrada_produto->produto_id,
                                 "fornecedor_id" => $objEntrada_produto->fornecedor_id,
                                 "quantidade" => $objEntrada_produto->quantidade,
                                 "lote" => $objEntrada_produto->lote,
                                 "dt_compra" => $objEntrada_produto->dt_compra,
                                 "dt_validade" => $objEntrada_produto->dt_validade,
                                 "valor_unitario" => $objEntrada_produto->valor_unitario,
                                 "valor_total" => $objEntrada_produto->valor_total);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $entrada_produto->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"produto_id","title"=>"Produto_id","width"=>60, "align"=>"center"),
                array("field"=>"fornecedor_id","title"=>"Fornecedor_id","width"=>60, "align"=>"center"),
                array("field"=>"quantidade","title"=>"Quantidade","width"=>60, "align"=>"center"),
                array("field"=>"lote","title"=>"Lote","width"=>60, "align"=>"center"),
                array("field"=>"dt_compra","title"=>"Dt_compra","width"=>60, "align"=>"center"),
                array("field"=>"dt_validade","title"=>"Dt_validade","width"=>60, "align"=>"center"),
                array("field"=>"valor_unitario","title"=>"Valor_unitario","width"=>60, "align"=>"center"),
                array("field"=>"valor_total","title"=>"Valor_total","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $entrada_produto->populationClass($_REQUEST);
                $return = $entrada_produto->save();
                print json_encode(array("success" => $return,"errorMsg" => $entrada_produto->getError()));
            break;
            
            
            case "delete":
                $entrada_produto->populationClass($_REQUEST);
                $return = $entrada_produto->delete();
                print json_encode(array("success" => $return,"errorMsg" => $entrada_produto->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $entrada_produto->populationClass($_REQUEST);
                $return = $entrada_produto->save();
                print json_encode(array("success" => $return,"errorMsg" => $entrada_produto->getError()));
            break;
            
        }
?>
        