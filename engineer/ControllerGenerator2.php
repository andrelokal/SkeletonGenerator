<?php
class ControllerGenerator2 extends DAO{
    
    public $path;
    
    public function __construct($path){
        $this->path = $path;
    }
    
    
    public function generateByTable($table){
        
        $newObj = new StdClass;
        
        $newObj->table = $table;
        
        $this->getProperties($newObj);

        $resultConstraint = $this->getConstraint($table);
        
        $fields1 = "";
        $fields2 = "";
        
        $numAt = count($this->arrProperties);
        $count = 1;
        $refConst = "";
        
        if($resultConstraint){
            if(is_array($resultConstraint)){
                foreach($resultConstraint as $value){
                    $tab = $count > 1 ? "\t \t \t" : "";
                    $QUERY = "show full columns from {$value->REFTABELA} where comment = 'label'";
                    $COLUMN = parent::doExecuteSelect($QUERY);
                    $refConst .= $tab.'$response->'.$value->REFTABELA.' = $obj->'.$value->REFTABELA.'->'.$COLUMN->Field.';'."\n";   
                    
                    $count++;
                } 
            }else{
                $value = $resultConstraint;
                    $QUERY = "show full columns from {$value->REFTABELA} where comment = 'label'";
                    $COLUMN = parent::doExecuteSelect($QUERY);
                    $refConst .= '$response->'.$value->REFTABELA.' = $obj->'.$value->REFTABELA.'->'.$COLUMN->Field.';'."\n"; 
            }
        }


        $content = '<?php
     class '.ucfirst($table).'Controller{
        
        private $obj;
        public $data;
        public $msg;
        
        public function __construct(){
            $this->obj = new '.ucfirst($table).'();
        }    
        
        public function selectAll($offset = "",$rows = ""){
        
            $response = $this->obj->selectAll($offset,$rows);       
        
            if($response){
                $this->data = $response;
                $this->msg = "Sucesso";
                return true;
            }else{
                $this->msg = "Sem Resultados";
                return false;
            }
        
        
            
        }
        
        
        public function selectById($id){
        
            $response = $this->obj->selectById($id);
            
            '.$refConst.'       
        
            if($response){
                $this->data = $response;
                $this->msg = "Sucesso";
                return true;
            }else{
                $this->msg = "Sem Resultados";
                return false;
            }
            
        }
        
        
        public function save($request){
            
            $arrayDados = json_decode($request, true);            

            foreach($arrayDados as $key => $value){
                    $arrayDados[$key] = $value == "" ? "null" : $value;
            }
            
            $'.$table.'->populationClass($arrayDados);
            $response = $'.$table.'->save();
            
            if($response){
                $this->data = $response;
                $this->msg = "Sucesso";
                return true;
            }else{
                $this->msg = "Sem Resultados";
                return false;
            }

        }
        
        
        public function delete($request){
       
            $arrayDados = json_decode($request, true);
                
            $'.$table.'->populationClass($arrayDados);
            $return = $'.$table.'->delete();
            
            if($return){
                $this->data = $response;
                $this->msg = "Sucesso";
                return true;
            }else{
                $this->msg = "Sem Resultados";
                return false;
            }
            
        }    
            
            
     }       
 ?>';
        
        
        
        file_put_contents($this->path.'/'.$table."Controller.php",$content, FILE_APPEND);
        
        
        
        
        
        
    }

    
    
    
    
}
?>
