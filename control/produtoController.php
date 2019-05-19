      
<?php

        require_once("../util/config.php");

        if(isset($_REQUEST["action"])){
            $action = $_REQUEST["action"];
        }


        $produto = new Produto();

        switch($action){
            case "get_data":

                $page = isset($_REQUEST["page"]) ? intval($_REQUEST["page"]) : 1;
                $rows = isset($_REQUEST["rows"]) ? intval($_REQUEST["rows"]) : 20;
                $offset = ($page-1)*$rows;
                
                $id = isset($_REQUEST["id"]) ? intval($_REQUEST["id"]) : 0;
            
                $collection = array();
                foreach($produto->selectAll($offset,$rows) as $objProduto){
                    
                        $arr = array("id" => $objProduto->id,
                                 "codigo" => $objProduto->codigo,
                                 "codbar" => $objProduto->codbar,
                                 "categoria" => $objProduto->categoria,
                                 "categoria_id" => $objProduto->categoria_id,
                                 "nome" => $objProduto->nome,
                                 "descricao" => $objProduto->descricao,
                                 "valor" => $objProduto->valor,
                                 "unidade_id" => $objProduto->unidade_id,
                                 "unidade" => $objProduto->unidade);
                    array_push($collection,$arr);
                }
                $arrJson["total"] = $produto->getTotalRows()->TOTAL;
                $arrJson["rows"] = $collection;
                $arrJson["columns"] =  array(
                                        
                array("field"=>"codigo","title"=>"Codigo","width"=>60, "align"=>"center"),
                array("field"=>"codbar","title"=>"Codbar","width"=>60, "align"=>"center"),
                array("field"=>"categoria","title"=>"Categoria","width"=>60, "align"=>"center"),
                array("field"=>"nome","title"=>"Nome","width"=>60, "align"=>"center"),
                array("field"=>"descricao","title"=>"Descricao","width"=>60, "align"=>"center"),
                array("field"=>"valor","title"=>"Valor","width"=>60, "align"=>"center"),
                array("field"=>"unidade","title"=>"Unidade","width"=>60, "align"=>"center")
                                        );
                    
                print json_encode($arrJson);
            break;
            
            case "save":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $produto->populationClass($_REQUEST);
                $return = $produto->save();
                print json_encode(array("success" => $return,"errorMsg" => $produto->getError()));
            break;
            
            
            case "delete":
                $produto->populationClass($_REQUEST);
                $return = $produto->delete();
                print json_encode(array("success" => $return,"errorMsg" => $produto->getError()));
            break;
            
            case "update":
                foreach($_REQUEST as $key => $value){
                    $_REQUEST[$key] = $value == "" ? "null" : $value;
                }
                $_REQUEST["id"] = $_REQUEST["id"];
                $produto->populationClass($_REQUEST);
                $return = $produto->save();
                print json_encode(array("success" => $return,"errorMsg" => $produto->getError()));
            break;
            
        }
?>
        