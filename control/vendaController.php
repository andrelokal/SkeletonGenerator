      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $venda = new Venda();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($venda->selectAll($offset,$rows) as $objVenda){
                    
                        $arr = array("id" => $objVenda->id,
                                 "cliente_id" => $objVenda->cliente_id,
                                 "desconto" => $objVenda->desconto,
                                 "total" => $objVenda->total,
                                 "data" => $objVenda->data);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $venda->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"cliente_id","title"=>"Cliente_id","width"=>60, "align"=>"center"),
                array("field"=>"desconto","title"=>"Desconto","width"=>60, "align"=>"center"),
                array("field"=>"total","title"=>"Total","width"=>60, "align"=>"center"),
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $venda->populationClass($_REQUEST);
                $return = $venda->save();
                print json_encode(array("success" => $return,"errorMsg" => $venda->getError()));
            break;
            
            
            case "delete":
                $venda->populationClass($_REQUEST);
                $return = $venda->delete();
                print json_encode(array("success" => $return,"errorMsg" => $venda->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $venda->populationClass($_REQUEST);
                $return = $venda->save();
                print json_encode(array("success" => $return,"errorMsg" => $venda->getError()));
            break;
            
        }
?>
        